<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    protected $fillable = [
        'enlace_id', 'mensaje',
    ];

    public function enlace()
    {
        return $this->belongsTo(Enlace::class);
    }
}
