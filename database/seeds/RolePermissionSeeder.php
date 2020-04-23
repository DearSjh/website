<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('role_permissions')->insert([
            ['id' => 70, 'role_id' => 3, 'permission_id' => 8, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 71, 'role_id' => 3, 'permission_id' => 9, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 72, 'role_id' => 3, 'permission_id' => 10, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 73, 'role_id' => 3, 'permission_id' => 11, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 74, 'role_id' => 3, 'permission_id' => 12, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 79, 'role_id' => 3, 'permission_id' => 7, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 80, 'role_id' => 3, 'permission_id' => 17, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 81, 'role_id' => 3, 'permission_id' => 18, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 82, 'role_id' => 3, 'permission_id' => 19, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 83, 'role_id' => 3, 'permission_id' => 20, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 84, 'role_id' => 3, 'permission_id' => 21, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 98, 'role_id' => 4, 'permission_id' => 7, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 99, 'role_id' => 5, 'permission_id' => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 100, 'role_id' => 5, 'permission_id' => 2, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 101, 'role_id' => 5, 'permission_id' => 3, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 102, 'role_id' => 5, 'permission_id' => 4, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 103, 'role_id' => 5, 'permission_id' => 5, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 104, 'role_id' => 5, 'permission_id' => 6, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 105, 'role_id' => 5, 'permission_id' => 8, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 106, 'role_id' => 5, 'permission_id' => 9, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 107, 'role_id' => 5, 'permission_id' => 10, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 108, 'role_id' => 5, 'permission_id' => 11, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 109, 'role_id' => 5, 'permission_id' => 12, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 110, 'role_id' => 5, 'permission_id' => 13, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 111, 'role_id' => 5, 'permission_id' => 14, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 112, 'role_id' => 5, 'permission_id' => 15, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 113, 'role_id' => 5, 'permission_id' => 16, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 114, 'role_id' => 5, 'permission_id' => 34, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 115, 'role_id' => 5, 'permission_id' => 35, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 116, 'role_id' => 5, 'permission_id' => 36, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 117, 'role_id' => 5, 'permission_id' => 37, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 118, 'role_id' => 5, 'permission_id' => 22, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 119, 'role_id' => 5, 'permission_id' => 23, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 120, 'role_id' => 5, 'permission_id' => 24, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 121, 'role_id' => 5, 'permission_id' => 25, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 122, 'role_id' => 5, 'permission_id' => 26, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 123, 'role_id' => 5, 'permission_id' => 27, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 124, 'role_id' => 5, 'permission_id' => 31, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 125, 'role_id' => 5, 'permission_id' => 32, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 126, 'role_id' => 5, 'permission_id' => 33, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 140, 'role_id' => 7, 'permission_id' => 34, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 141, 'role_id' => 7, 'permission_id' => 35, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 142, 'role_id' => 7, 'permission_id' => 36, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 143, 'role_id' => 7, 'permission_id' => 37, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 144, 'role_id' => 7, 'permission_id' => 22, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 145, 'role_id' => 7, 'permission_id' => 23, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 146, 'role_id' => 7, 'permission_id' => 24, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 147, 'role_id' => 7, 'permission_id' => 25, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 148, 'role_id' => 7, 'permission_id' => 26, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 149, 'role_id' => 7, 'permission_id' => 27, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 150, 'role_id' => 7, 'permission_id' => 31, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 151, 'role_id' => 7, 'permission_id' => 32, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 152, 'role_id' => 7, 'permission_id' => 33, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['id' => 158, 'role_id' => 6, 'permission_id' => 7, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]
        ]);
    }
}
