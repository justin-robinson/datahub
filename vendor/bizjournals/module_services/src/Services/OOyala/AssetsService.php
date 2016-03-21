<?php

namespace Services\Ooyala;

use Services\AbstractService;

class AssetsService extends AbstractService
{
    public function getPrimaryPreviewImage($id)
    {
        $result = $this->getClient()->get('assets/' . $id . '/primary_preview_image');
        return $result['url'];
    }
}
