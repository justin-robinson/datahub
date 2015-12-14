<?php

namespace Entity\Model;

use ArrayAccess;
use Entity\Entity\Base as EntityBase;
use Entity\Model\Exception\RuntimeException;
use Entity\ORM\EntityManager;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\Proxy\Proxy as EntityProxy;
use Doctrine\ORM\UnitOfWork as DoctrineUnitOfWork;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineObjectHydrator;
use Zend\Filter\Word\UnderscoreToCamelCase;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

abstract class Base implements ServiceLocatorAwareInterface, ArrayAccess
{
    // Used self#from getObjectState
    protected static $OBJECT_STATE_TYPE = array(
        '',
        'managed',
        'new',
        'detached',
        'removed',
    );

    /**
     * Doctrine entity class name
     *
     * @var string $entity_class      Doctrine entity class name
     * @access protected
     */
    protected $entity_class;

    /**
     * Service Manager instance
     *
     * @var ServiceManager
     */
    protected $serviceLocator;

    /**
     * Entity Manager instance
     *
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Doctrine entity record
     *
     * @var \Entity\Entity\Base
     */
    protected $entity;

    /**
     * Internal variable to hold primary key info (may be useful to
     * init method).
     *
     * @var array $primary
     * @access protected
     */
    protected $primary;

    /**
     * Internal variable to maintain attributes for object
     *  NOTE: attributes are only implemented if the static variable
     *  $attribute_key is set
     *
     * @var array $attributes     array of attributes associated with object
     * @access protected
     */
    protected $attributes = null;

    /**
     * Attribute (object_type) identifier (must be set to implement
     *  attributes for class.
     *
     * @staticvar string $attribute_key      attribute type identifier
     * @access protected
     */
    protected $attribute_key = '';

    /**
     * Doctrine entity class name for attributes table
     *
     * @staticvar string $metadata_class
     * @access protected
     */
    protected $metadata_class;

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Set entity manager
     *
     * @param EntityManager $entityManager
     * @return \Entity\Model\Base
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * Return entity class
     */
    public function getEntityClass()
    {
        return $this->entity_class;
    }

    /**
     * Fetch state of object
     *
     * @access public
     * @param string $type          'value' or 'text'
     * @return integer|string
     */
    public function getObjectState($type = 'value')
    {
        $state = $this->getEntityManager()->getUnitOfWork(get_class($this->entity))->getEntityState($this->entity);
        return ($type == 'text' ? self::$OBJECT_STATE_TYPE[$state] : $state);
    }

    /**
     * Return Doctrine entity class
     */
    public function getEntity()
    {
        if (!is_object($this->entity)) {
            $className = $this->entity_class;
            $this->entity = new $className;
        }

        return $this->entity;
    }

    /**
     * Set Doctrine schema record
     *
     * @param \Entity\Entity\Base $entity
     * @return \Entity\Model\Base
     */
    public function setEntity(\Entity\Entity\Base $entity)
    {
        $this->entity = $entity;
        $this->entity_class = get_class($entity);
        return $this;
    }

    /**
     * Return extracted entity - used recursively by public toArray method.
     *
     * @param $entity
     * @param boolean $deep
     * @param integer $level
     *  (don't let it go too deep or it eventually gets association back to original object)
     * @return array
     */
    protected function toArrayEntity($entity, $deep, $level = 1)
    {
        $hydrator = new DoctrineObjectHydrator($this->getEntityManager(), false);
        $data = $hydrator->extract($entity);
        $level += 1;
        foreach ($data as $key => $item) {
            if (gettype($item) == 'object' && get_class($item) != 'DateTime') {
                // Get deep, but not too deep... (we can run out of memory!)
                if ($deep && $level < 3) {
                    if ($item instanceof PersistentCollection) {
                        $newdata = array();
                        foreach ($item as $item2) {
                            $newdata[] = $this->toArrayEntity($item2, $deep, $level);
                        }
                        $data[$key] = $newdata;
                    } elseif ($item instanceof EntityProxy) {
                        //echo "Item key: $key - Removing object of class " . get_class($item) ."<br>\n";
                        unset($data[$key]);
                    } elseif ($item instanceof EntityBase) {
                        $data[$key] = $this->toArrayEntity($item, $deep, $level);
                    }
                } else {
                    //echo "Item key: $key - Removing object of class " . get_class($item) ."<br>\n";
                    unset($data[$key]);
                }
            }
        }
        return $data;
    }

    /**
     * Return extracted schema record
     *
     * @param boolean $deep (default: false)
     * @return array
     */
    public function toArray($deep = false)
    {
        return $this->toArrayEntity($this->getEntity(), $deep);
    }

    /**
     * Helper method used by some hydrators
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return $this->toArray();
    }

    /**
     * Populate entity values
     *
     * @param array $data
     */
    public function populate(array $data)
    {
        $entity = $this->getEntity();
        $hydrator = new DoctrineObjectHydrator($this->getEntityManager(), false);
        $this->entity = $hydrator->hydrate($data, $entity);

        return $this;
    }

    /**
     * Helper method used by some hydrators
     *
     * @return array
     */
    public function exchangeArray(array $data)
    {
        return $this->populate($data);
    }

    /**
     * Provides getter and setter methods.
     *
     * @param  string $method    The method name
     * @param  array  $arguments The method arguments
     * @return mixed The returned value of the called method
     */
    public function __call($method, $arguments)
    {
        $entity = $this->getEntity();
        if (method_exists($entity, $method)) {
            if (substr($method, 0, 3) == 'get') {
                return $entity->$method();
            } elseif (substr($method, 0, 3) == 'set') {
                $entity->$method($arguments[0]);
                return $this;
            }
        } elseif (substr($method, 0, 3) == 'get') {
            // Don't throw exceptions for get calls.
            return null;
        }
        throw new RuntimeException("Method $method does not exist in entity " . get_class($entity));
    }

    /**
     * @param offset
     */
    public function offsetExists($offset)
    {
        $filter = new UnderscoreToCamelCase();
        $method = 'get' . ucfirst($filter->filter($offset));

        return is_callable(array($this, $method));
    }

    /**
     * @param offset
     */
    public function offsetGet($offset)
    {
        $filter = new UnderscoreToCamelCase();
        $method = 'get' . ucfirst($filter->filter($offset));

        return $this->$method();
    }

    /**
     * @param offset
     * @param value
     */
    public function offsetSet($offset, $value)
    {
        $filter = new UnderscoreToCamelCase();
        $method = 'set' . ucfirst($filter->filter($offset));

        return $this->$method($value);
    }

    /**
     * @param offset
     */
    public function offsetUnset($offset)
    {
        // can not remove items from the schema
    }

    /**
     * Save entity to database
     * 
     * @param  array $options
     */
    public function save(array $options = array())
    {
        $em = $this->getEntityManager();
        $entity = $this->getEntity();

        $em->persist($entity);
        $em->flush();
        $this->attributes = null;
    }

    /**
     * Delete entity from database
     */
    public function delete()
    {
        $em = $this->getEntityManager();
        $entity = $this->getEntity();

        $em->remove($entity);
        $em->flush();
        $this->attributes = null;
    }

    /**
     * Get Doctrine ClassMetadata object
     *
     * @access protected
     * @return \Doctrine\ORM\Mapping\ClassMetadataInfo
     */
    protected function getClassMetadata()
    {
        return $this->getEntityManager()->getClassMetadata($this->entity_class);
    }

    protected function initAttributes()
    {
        $class = $this->entity_class;
        if ($class && $this->metadata_class && $this->attribute_key) {
            $this->primary = $this->getClassMetadata()->getIdentifierValues($this->entity);
            // @todo: When migrating from Schema-based models, may need to fix db for
            // attributes based on compound-key tables.  (There may not be any to fix.)
            if ($this->getObjectState() == DoctrineUnitOfWork::STATE_MANAGED) {
                $attribute_id = implode('~|~', $this->primary);
                if ($this->attribute_key && $attribute_id) {
                    $hasAttrCache = 0; // Placeholder for future attribute caching
                    $attributes = array(); // Temp until caching enabled
                    if (!$hasAttrCache) {
                        $attributes = array();
                        $collection =  $this->getEntityManager()->createQuery(
                            'SELECT a FROM ' . $this->metadata_class
                            . ' a WHERE a.object_type = :type AND a.object_id = :id ORDER BY a.meta_name'
                        )
                            ->setParameters(array('type' => $this->attribute_key, 'id' => $attribute_id))
                            ->getResult();
                        if ($collection) {
                            foreach ($collection as $attribute) {
                                $attributes[$attribute->getMetaName()] = array(
                                    'attribute'  => $attribute,
                                    'is_dirty'   => 0,
                                );
                            }
                        }
                    }
                    $this->attributes = $attributes;
                }
            }
        } else {
            throw new RuntimeException(sprintf('Entity name not defined in %s', get_called_class()));
        }
    }

    /**
     * Fetch attributes data
     *
     * @access public
     * @return array
     */
    public function getAttributes()
    {
        if ($this->attributes === null) {
            $this->initAttributes();
        }
        $attributes = array();
        foreach ($this->attributes as $akey => $aitem) {
            $attributes[$akey] = array(
                'meta_id'    => $aitem['attribute']->getMetaId(),
                'value'      => $aitem['attribute']->getMetaValue(),
                'created_at' => $aitem['attribute']->getCreatedAt(),
                'updated_at' => $aitem['attribute']->getUpdatedAt(),
                'is_dirty'   => $aitem['is_dirty'],
            );
        }
        return $attributes;
    }

    /**
     * Fetch a named attribute
     *
     * @access public
     * @param  string $name
     * @return string
     */
    public function getAttribute($name = '')
    {
        if ($this->attributes === null) {
            $this->initAttributes();
        }
        $return = null;
        if (array_key_exists($name, $this->attributes)) {
            $return = ($this->attributes[$name]['is_dirty'] == 2 ? null : $this->attributes[$name]['attribute']->getMetaValue());
        }
        return $return;
    }

    /**
     * Set a named attribute
     *
     * @access public
     * @param  string $name
     * @param  string $value
     * @return self
     */
    public function setAttribute($name, $value)
    {
        if ($this->attributes === null) {
            $this->initAttributes();
        }
        $pk = intval(implode('~|~', $this->primary));
        if ($pk > 0) {
            if ($this->entity) {
                if (array_key_exists($name, $this->attributes)) {
                    if ($value !== $this->attributes[$name]['attribute']->getMetaValue()) {
                        $this->attributes[$name]['attribute']->setMetaValue($value);
                        $this->attributes[$name]['is_dirty'] = 1;
                        $this->_is_dirty = true;
                        $this->getEntityManager()->persist($this->attributes[$name]['attribute']);
                    }
                } else {
                    $metaclass = $this->metadata_class;
                    $this->attributes[$name] = array(
                        'is_dirty'  => 1,
                        'attribute' => new $metaclass(),
                    );
                    $this->attributes[$name]['attribute']->setObjectType($this->attribute_key);
                    $this->attributes[$name]['attribute']->setObjectId($pk);
                    $this->attributes[$name]['attribute']->setMetaName($name);
                    $this->attributes[$name]['attribute']->setMetaValue($value);
                    $this->_is_dirty = true;
                    $this->getEntityManager()->persist($this->attributes[$name]['attribute']);
                }
            }
        }
        return $this;
    }

    /**
     * Delete a named attribute
     *
     * @access public
     * @param  string $name
     * @return self
     */
    public function deleteAttribute($name)
    {
        if ($this->attributes === null) {
            $this->initAttributes();
        }
        if (array_key_exists($name, $this->attributes)) {
            $this->attributes[$name]['is_dirty'] = 2;
            $this->_is_dirty = true;
            $this->getEntityManager()->remove($this->attributes[$name]['attribute']);
        }
        return $this;
    }

    /**
     * Create new empty model
     *
     * @return self
     */
    public function newModel()
    {
        $model = new static;
        $model->setServiceLocator($this->getServiceLocator())
            ->setEntityManager($this->getEntityManager());
        
        if ($model instanceof InitProviderInterface) {
            $model->init();
        }
        
        return $model;
    }

    /**
     * Hydrate new model
     *
     * @param \Entity\Entity\Base $entity
     * @param string $class
     * @return Base
     */
    public function hydrateNewModel(\Entity\Entity\Base $entity, $class)
    {
        $model = new $class;
        $model->setEntity($entity)
            ->setServiceLocator($this->getServiceLocator())
            ->setEntityManager($this->getEntityManager());
        
        if ($model instanceof InitProviderInterface) {
            $model->init();
        }
        
        return $model;
    }

    /**
     * Refresh an Entity's data and relations
     *
     * @see \Doctrine\ORM\EntityManager#refresh
     * @return self
     */
    public function refresh()
    {
        $em = $this->getEntityManager();
        if (is_object($this->entity)) {
            $em->refresh($this->entity);
        }
        return $this;
    }

    /**
     * Finds an Entity by its identifier.
     *
     * This is just a convenient shortcut for getRepository($entityName)->find($id).
     *
     * @see \Doctrine\ORM\EntityRepository#find
     * @param mixed $identifier
     * @param int $lockMode
     * @param int $lockVersion
     * @return object
     */
    public function find($identifier)
    {
        $em = $this->getEntityManager();
        $result = $em->getRepository($this->entity_class)->find($identifier);
        if ($result) {
            return $this->hydrateNewModel($result, get_called_class());
        }

        return null;
    }

    /**
     * Finds all entities in the repository.
     *
     * @return array The entities.
     */
    public function findAll()
    {
        return $this->findBy(array());
    }

    /**
     * Finds entities by a set of criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return array The objects.
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $em = $this->getEntityManager();
        $results = $em->getRepository($this->entity_class)->findBy($criteria, $orderBy, $limit, $offset);

        $return = array();
        foreach ($results as $result) {
            $return[] = $this->hydrateNewModel($result, get_called_class());
        }

        return $return;
    }

    /**
     * Finds a single entity by a set of criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return object
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $em = $this->getEntityManager();
        $result = $em->getRepository($this->entity_class)->findOneBy($criteria, $orderBy);
        if ($result) {
            return $this->hydrateNewModel($result, get_called_class());
        }

        return null;
    }
}
