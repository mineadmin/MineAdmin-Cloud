<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\ConfigCenter\Mode;

use function Hyperf\Support\env;

return [
    'enable' => (bool) env('ENABLE', true),
    'driver' => env('DRIVER', 'nacos'),
    'mode' => env('MODE', Mode::PROCESS),
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_OVERWRITE,
            'interval' => 3,
            'default_key' => 'mineadmin',
            'listener_config' => [
                'mineadmin' =>[
                    'tenant'    =>  env('CONFIG_TENANT','mineadmin'),
                    'data_id'   =>  env('CONFIG_DATA_ID','gateway.admin'),
                    'group'     =>  env('CONFIG_GROUP','mineadmin'),
                    'type'      =>  env('CONFIG_TYPE','json')
                ]
            ],
        ],
    ],
];
