<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/3
 * Time: 16:47
 */

$factory->define(\App\Models\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->titleMale,
        'category_id' => rand(3, 4),
        'abstract' => $faker->title,
        'keyword' => $faker->title,
        'content' => $faker->text(rand(10, 100)),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});