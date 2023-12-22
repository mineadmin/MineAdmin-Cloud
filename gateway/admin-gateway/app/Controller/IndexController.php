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

namespace App\Controller;

use function Hyperf\Config\config;

class IndexController extends AbstractController
{
    public function index()
    {
        var_dump(config('databases'));
        return [
            config('nacos_config')
        ];
    }
}
