<?php

use Faker\Generator as Faker;

$factory->define(App\DriverKit::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'os_version_id' => function () {
            return factory('App\OSVersion')->create()->id;
        },
        'product_id' => function () {
            return factory('App\Product')->create()->id;
        },
        'url' => $faker->url
    ];
});
