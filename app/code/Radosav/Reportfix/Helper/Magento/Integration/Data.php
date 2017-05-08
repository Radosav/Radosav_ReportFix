<?php

namespace Radosav\Reportfix\Helper\Magento\Integration;


class Data extends \Magento\Integration\Helper\Data {

    public function mapResources(array $resources)
    {
        $output = [];
        foreach ($resources as $resource) {
            $item = [];
            $item['attr']['data-id'] = $resource['id'];
            $item['data'] = isset($resource['title']) ? $resource['title'] : 'Extension Developer did not set Title';
            $item['children'] = [];
            if (isset($resource['children'])) {
                $item['state'] = 'open';
                $item['children'] = $this->mapResources($resource['children']);
            }
            $output[] = $item;
        }
        return $output;
    }
}
