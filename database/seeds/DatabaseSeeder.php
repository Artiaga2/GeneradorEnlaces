<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 1)->create([
            'id' => 1,
            'login_id' => 1
        ]);

        factory(App\Enlace::class, 1)->create(['user_id' => 1])->each(function ($enlace){
            $enlace->tags()->save(factory(App\Tag::class)->make());
        });

        factory(App\Comentario::class, 1)->create([
            'enlace_id' => 1
        ]);

    }



}
