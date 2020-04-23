<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdminTableSeeder');
        $this->call('LanguageSeeder');
        $this->call('MenuTableSeeder');
        $this->call('PermissionSeeder');
        $this->call('RolePermissionSeeder');
        $this->call('RoleSeeder');
    }
}
