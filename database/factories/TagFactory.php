<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {

        $nombre = $faker->word;
        $slug = str_slug($nombre);

    return [
        'nombre' => $nombre,
        'slug' => $slug,
    ];
});
