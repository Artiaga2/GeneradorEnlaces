<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    public function enlace()
    {
        return $this->belongsTo(Enlace::class);
    }
}
