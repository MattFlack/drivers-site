<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'name' => $faker->word,
        'product_category_id' => function () {
            return factory('App\ProductCategory')->create()->id;
        }
    ];
});
