<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/3
 * Time: 16:47
 */

$factory->define(\App\Models\Message::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->titleMale,
        'name' => $faker->userName,
        'mobile' => mb_substr($faker->phoneNumber, 0, 10),
        'email' => mb_substr($faker->unique()->safeEmail, 0, 30),
        'address' => mb_substr($faker->address, 0, 40),
        'content' => $faker->text(rand(10,100)),
        'state' => rand(0, 1),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});