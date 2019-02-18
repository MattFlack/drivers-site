<?php

use Faker\Generator as Faker;

$factory->define(App\Bios::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'product_id' => function () {
            return factory('App\Product')->create()->id;
        },
        'version' => '1.0' . $faker->numberBetween(0,9),
        'url' => $faker->url
    ];
});
