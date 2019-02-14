<?php

use Faker\Generator as Faker;

$factory->define(App\OSVersion::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'name' => $faker->word,
    ];
});
