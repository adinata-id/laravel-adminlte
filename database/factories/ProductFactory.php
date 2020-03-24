<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        'satuan' => 'kg',
        'buy_price' => 10000.00,
        'sell_price'    => 20000.00,
    ];
});
