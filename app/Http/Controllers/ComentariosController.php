<?php

namespace App\Http\Controllers;

use App\Enlace;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{
    public function store($id)
    {

        $this->validate(request(), [
            'mensaje' => 'required|min:2'
        ]);


        $enlace = Enlace::findOrFail($id);

        $enlace->addComment(request('mensaje'));

        return back();
    }

}
