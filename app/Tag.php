<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nombre', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(Enlace::class);
    }
}
