<?php

namespace App;


class Enlace extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
