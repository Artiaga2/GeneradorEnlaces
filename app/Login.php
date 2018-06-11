<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public function users(){

        return $this->belongsTo(User::class);
    }
}
