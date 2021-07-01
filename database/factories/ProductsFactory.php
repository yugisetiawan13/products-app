<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use App\Category;
use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'category_id' => factory(Category::class),
        'unit_id' => factory(Unit::class),
        'product_name' => $faker->name,
        'sku' => $faker->creditCardNumber,
        'price' => $faker->numberBetween(50000,1000000),
        'sale_price' => $faker->numberBetween(100000,200000),
        'description' => $faker->word()
    ];
});
