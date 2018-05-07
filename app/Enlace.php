<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    protected $fillable = [
        'titulo', 'tipo', 'descripcion'
    ];

    protected $guarded =['id', 'created_at', 'updated_at'];
}
