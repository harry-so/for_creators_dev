<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'item_name' => $faker->title,
        'min_price' => $faker->randomNumber(),
        'item_desc' => $faker->realText(),
        'published' => now(),
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
