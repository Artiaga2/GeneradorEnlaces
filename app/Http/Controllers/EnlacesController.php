<?php

namespace App\Http\Controllers;

use App\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enlaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Enlace::create([

            'nombre'        => $request->input('nombre'),
            'titulo'        => $request->input('titulo'),
            'tipo'          => $request->input('tipo'),
            'descripcion'   => $request->input('descripcion')

        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function show(Enlace $enlace)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function edit(Enlace $enlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enlace $enlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enlace $enlace)
    {
        //
    }
}
