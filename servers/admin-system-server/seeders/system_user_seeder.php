<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class SystemUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefix = \Hyperf\Support\env('DB_PREFIX');
        $password = password_hash('mineadmin',PASSWORD_DEFAULT);
        Db::table('system_user')->truncate();
        Db::insert(
            "insert into `{$prefix}system_user` (`username`, `password`, `nickname`, `phone`, `email`, `avatar`, `signed`) values ('mineadmin','{$password}',100,'SupperAdmin','123456','---','有人思来年') "
        );
    }
}
