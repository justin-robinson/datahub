<?php

namespace Services\Medialibrary;

class MediaService extends AbstractMediaService
{
    public function get($id)
    {
        $result = $this->getClient()->get('media', array('id' => $id));
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['media'];
        }
    }
    
    public function getMediaCrop(array $params = array())
    {
        $result = $this->getClient()->get('mediacrop', $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['mediacrop'];
        }
    }
    
    public function createMediaCrop(array $params = array())
    {
        $result = $this->getClient()->post('mediacrop', $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['mediacrop'];
        }
    }
    
    public function getMediaUrl(array $params = array())
    {
        $result = $this->getClient()->get('mediaurl', $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['mediaurl'];
        }
    }
    
    public function getMediaLink(array $params = array())
    {
        if (!isset($params['source'])) {
            $params['source'] = 'bizjcms';
        }
        $result = $this->getClient()->get('medialink', $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            $return = array();
        } else {
            $this->last_error = array();
            $return = $result['medialibrary']['medialink'];
        }
        if (count($return)) {
            $return = array();
            foreach ($result['medialibrary']['medialink'] as $item) {
                $return[$item['media_id']] = $item;
            }
        }
        return $return;
    }
    
    public function putMediaLink($link_id, array $params = array())
    {
        $result = $this->getClient()->put("medialink/$link_id", $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['medialink'];
        }
    }
    
    public function postMediaLink(array $params = array())
    {
        if (!isset($params['use_source'])) {
            $params['use_source'] = 'bizjcms';
        }
        $result = $this->getClient()->post('medialink', $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['medialink'];
        }
    }
    
    public function getKrangImport($bizj_media_id)
    {
        $result = $this->getClient()->get("krangimport/$bizj_media_id");
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['krangimport'];
        }
    }
    
    public function putKrangImport($bizj_media_id, array $params = array())
    {
        $result = $this->getClient()->put("krangimport/$bizj_media_id", $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['krangimport'];
        }
    }
    
    public function getNascarImport($product_id)
    {
        $result = $this->getClient()->get("nascarimport/$product_id");
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['nascarimport'];
        }
    }
    
    public function putNascarImport($product_id, array $params = array())
    {
        $result = $this->getClient()->put("nascarimport/$product_id", $params);
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['nascarimport'];
        }
    }
    
    public function deleteMediaLink($link_id)
    {
        $result = $this->getClient()->delete("medialink/$link_id");
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['medialink'];
        }
    }
    
    public function getTags($pub_id = null)
    {
        $result = $this->getClient()->get('tag');
        return $result['medialibrary']['tag'];
        if ($result['medialibrary']['status']['code']) {
            $this->last_error = $result;
            return array();
        } else {
            $this->last_error = array();
            return $result['medialibrary']['tag'];
        }
    }
    
    public function save(array $params = array())
    {
        $id = null;
        if (isset($params['id'])) {
            $id = $params['id'];
            unset($params['id']);
        }
        
        if (isset($params['media_id'])) {
            $id = $params['media_id'];
            unset($params['media_id']);
        }
        
        if (empty($id)) {
            throw new InvalidArgumentException('Missing param: id or media_id');
        }
        
        $result = $this->getClient()->put('media/' . $id, $params);
        return $result['medialibrary'];
    }
    
    public function delete($id)
    {
        $result = $this->getClient()->delete('media/' . $id);
        return $result['medialibrary'];
    }
}
