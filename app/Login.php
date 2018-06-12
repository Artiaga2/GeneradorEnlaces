<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model

{

    protected $fillable = [
        'user_id'
    ];

    public function users(){

        return $this->belongsTo(User::class);
    }
}
