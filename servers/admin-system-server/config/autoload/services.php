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
return [
    'enable'    =>[
        // 开启服务发现
        'discovery' => true,
        // 开启服务注册
        'register' => true,
    ],
    'drivers' => [
        'nacos' => [
            // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
            // 'url' => '',
            // The nacos host info
            'host' => '127.0.0.1',
            'port' => 8848,
            // The nacos account info
            'username' => null,
            'password' => null,
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => 'mineadmin',
            'namespace_id' => 'e7f2d566-e63a-441f-9f03-6cd13ebe77b8',
            'heartbeat' => 5,
            'ephemeral' => false, // 是否注册临时实例
        ],
    ],
    'consumers' => [
    ],
];
