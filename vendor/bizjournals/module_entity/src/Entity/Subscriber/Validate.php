<?php

namespace Entity\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

/**
 * Validate
 *
 * @package    Entity
 * @subpackage Entity\Subscriber
 * @author     bizjournals <bizops@bizjournals.com>
 * @version    SVN: $Id: Validate.php 5884 2013-02-08 16:09:15Z atodd $
 */
class Validate implements EventSubscriber
{
    /**
     * Specifies the list of events to listen
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
            'loadClassMetadata'
        );
    }
    
    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        $metadata = $args->getClassMetadata();
        foreach ($metadata->fieldMappings as $field_name => $field_data) {
            $field_options = (isset($field_data['options']) && is_array($field_data['options']) ? $field_data['options'] : array());
            if (isset($field_options['default'])) {
                $field_data['default'] = $field_options['default'];
                $metadata->fieldMappings[$field_name] = $field_data;
            }
        }
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->doValidate($args);
    }
    
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->doValidate($args);
    }
    
    private function doValidate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $className = get_class($entity);
        
        $metadata = $args->getEntityManager()->getClassMetadata($className);
        foreach ($metadata->fieldMappings as $field_name => $field_data) {
            $field_options = (isset($field_data['options']) && is_array($field_data['options']) ? $field_data['options'] : array());
            if (isset($field_options['validate'])) {
                $current_value = $metadata->reflFields[$field_name]->getValue($entity);
                if (!in_array($current_value, $field_options['validate'])) {
                    throw new \UnexpectedValueException(
                        sprintf("Validation error on '%s.%s' invalid value (%s) - valid options are: %s", $className, $field_name, $current_value, implode(', ', $field_options['validate']))
                    );
                }
            }
        }
    }
}
