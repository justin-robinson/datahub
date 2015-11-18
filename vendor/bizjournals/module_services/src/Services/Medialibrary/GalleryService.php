<?php

namespace Services\Medialibrary;

use Services\AbstractService;

class GalleryService extends AbstractMediaService
{
    public function getList($pub_id)
    {
        return $this->search(array('pub_id' => $pub_id, 'limit' => 200));
    }
    
    public function get($id)
    {
        $result = $this->getClient()->get('gallery', array('id' => $id));
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['gallery'];
        }
    }
    
    public function create(array $params = array())
    {
        $result = $this->getClient()->post('gallery', $params);
        return $result['medialibrary'];
    }
    
    public function save($id, array $params = array())
    {
        $result = $this->getClient()->put('gallery/' . $id, $params);
        return $result['medialibrary'];
    }
    
    public function delete($id)
    {
        $result = $this->getClient()->delete('gallery/' . $id);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary'];
        }
    }
    
    public function copy($id, $pub_id)
    {
        $result = $this->getClient()->post('gallery/copy', array('id' => $id, 'pub_id' => $pub_id));
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary'];
        }
    }
    
    public function search(array $params = array())
    {
        $galleries = array();
        $pub = $this->getServiceLocator()->get('CMS\Model\Publication');
        
        $result = $this->getClient()->get('gallery', $params);
        if ($result['medialibrary']['gallery']['total_count']) {
            foreach ($result['medialibrary']['gallery']['results'] as $gallery) {
                $timezone = $pub->find($gallery['pub_id'])->getTimeZone();
                $gallery['date_created'] = new \DateTime($gallery['date_created']);
                $gallery['date_created']->setTimezone(new \DateTimeZone($timezone));
                $gallery['date_updated'] = new \DateTime($gallery['date_updated']);
                $gallery['date_updated']->setTimezone(new \DateTimeZone($timezone));
                $galleries[] = $gallery;
            }
            
            $result['medialibrary']['gallery']['results'] = $galleries;
        }
        
        return $result['medialibrary']['gallery'];
    }
}
