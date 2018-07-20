<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Json\Json;

class ManifestPath extends AbstractHelper
{
    private $manifest;

    /**
     * @param boolean $value
     * @return string
     */
    public function __invoke($key)
    {
        return isset($this->getManifest()[$key]) ? $this->getManifest()[$key] : $key;
    }

    private function getManifest()
    {
        if (! $this->manifest) {
            if (!is_file('./public/dist/manifest.json')) {
                return [];
            }
            $manifest = file_get_contents('./public/dist/manifest.json');
            try {
                $this->manifest = Json::decode($manifest, Json::TYPE_ARRAY);
            } catch (\Zend\Json\Exception\ExceptionInterface $exception) {
                return [];
            }
        }
        return $this->manifest;
    }
}
