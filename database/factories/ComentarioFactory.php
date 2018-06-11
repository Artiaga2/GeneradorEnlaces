<?php

use Faker\Generator as Faker;

$factory->define(App\Comentario::class, function (Faker $faker) {
    return [
        'mensaje'   => $faker->realText(random_int(50, 250)),
    ];
});
