<?php

namespace Entity\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;

/**
 * The Timestampable listener handles the update of
 * dates on creation and update.
 *
 * @package    Entity
 * @subpackage Entity\Subscriber
 * @author     bizjournals <bizops@bizjournals.com>
 * @version    SVN: $Id: Timestampable.php 5888 2013-02-08 20:29:21Z atodd $
 */
class Timestampable implements EventSubscriber
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
            'onFlush'
        );
    }
    
    /**
     * Looks for Timestampable objects being updated
     * to update modification date
     *
     * @param EventArgs $args
     * @return void
     */
    public function onFlush(OnFlushEventArgs $args)
    {
        $em = $args->getEntityManager();
        $unitOfWork = $em->getUnitOfWork();
        
        foreach ($unitOfWork->getScheduledEntityUpdates() as $entity) {
            $needChanges = false;
            $metadata = $em->getClassMetadata(get_class($entity));
            foreach ($metadata->fieldMappings as $field => $data) {
                if (isset($data['options']) && isset($data['options']['timestampable'])) {
                    if ($data['options']['timestampable']['on'] == 'update') {
                        $needChanges = true;
                        $metadata->getReflectionProperty($field)->setValue($entity, new \DateTime('now'));
                    }
                }
            }
            
            if ($needChanges) {
                $unitOfWork->recomputeSingleEntityChangeSet($metadata, $entity);
            }
        }
    }

    /**
     * Checks for persisted Timestampable objects
     * to update creation and modification dates
     *
     * @param EventArgs $args
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $className = get_class($entity);
        
        $metadata = $args->getEntityManager()->getClassMetadata($className);
        foreach ($metadata->fieldMappings as $field => $data) {
            if (isset($data['options']) && isset($data['options']['timestampable'])) {
                $property = $metadata->getReflectionProperty($field);
                if ($property->getValue($entity) === null) { // let manual values
                    $property->setValue($entity, new \DateTime('now'));
                }
            }
        }
    }
}
