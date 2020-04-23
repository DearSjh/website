<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('languages')->insert([
            [
                'name' => '中文',
                'pic' => '/images/lang/china.gif',
                'state' => 1,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ],
            [
                'name' => '英文',
                'pic' => '/images/lang/ying.gif',
                'state' => 1,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ]

        ]);
    }
}
