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
    // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
    // 'url' => '',
    // The nacos host info
    'host' => \Hyperf\Support\env('NACOS_HOST','127.0.0.1'),
    'port' => \Hyperf\Support\env('NACOS_PORT',8848),
    // The nacos account info
    'username' => \Hyperf\Support\env('NACOS_USER'),
    'password' => \Hyperf\Support\env('NACOS_PWD'),
    'guzzle' => [
        'config' => null,
    ],
];
