<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function enlaces()
    {
        return $this->hasMany(Enlace::class);
    }
}
