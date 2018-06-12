<?php

use Faker\Generator as Faker;

$factory->define(App\Login::class, function (Faker $faker) {
    return [

        'navegador' => $faker->userAgent,
        'ip' => $faker->ipv4

    ];
});
