<?php


class AdminTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'user_name' => SUPER_ADMINISTRATOR,
            'password' => password_hash('123456', PASSWORD_BCRYPT),
            'email' => '95723515@qq.com',
            'state' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
    }
}