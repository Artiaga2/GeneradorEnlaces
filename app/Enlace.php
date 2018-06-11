<?php

namespace App;


class Enlace extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }


}
