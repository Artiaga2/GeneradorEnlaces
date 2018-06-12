<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'positivo' => $faker->numberBetween(0, 100),
        'negativo' => $faker->numberBetween(0, 100)
    ];
});
