<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Wallet;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'user_id' => $faker->uuid,
        'name' => $faker->name,
    ];
});
