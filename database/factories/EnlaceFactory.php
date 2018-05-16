<?php

use App\Enlace;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Enlace::class, function (Faker $faker) {

    $titulo = rtrim($faker->realText(random_int(25,50)), '.');
    $slug = str_slug($titulo);

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'titulo' => $titulo,
        'slug' => $slug,
        'tipo' => $faker->randomElement(array('Enlace', 'PDF', 'Imagen', 'Nota')),
        'descripcion' => $faker->realText(random_int(10,20)),
        'created_at'=> ($time1 < $time2) ? $time1 : $time2,
        'updated_at'=> ($time1 > $time2) ? $time1 : $time2

    ];
});
