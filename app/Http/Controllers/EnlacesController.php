<?php

namespace App\Http\Controllers;

use App\Enlace;
use App\Tag;
use App\User;
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
        $enlaces = Enlace::latest()
            ->filter(request(['month', 'year']))
            ->paginate(10);

        // Here we send the data through the PHP function 'compact'
        // See Documentation: http://php.net/manual/es/function.compact.php
        return view('admin.enlaces.index', compact('enlaces'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enlaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \auth()->user()->id;

        $tags = explode(", ",\request('tags'));

      $enlace = Enlace::create([

            'titulo'        => $request->input('titulo'),
            'slug' => str_slug(\request('titulo')),
            'uri'           => $request->input('uri'),
            'tipo'          => $request->input('tipo'),
            'descripcion'   => $request->input('descripcion'),
            'privacidad'    => $request->input('privacidad'),
            'user_id'       => $user,

        ]);

        foreach ($tags as $tag){
            $tag = Tag::firstOrCreate([
                'nombre' => $tag,
                'slug' => str_slug($tag)
            ]);
            $enlace->tags()->attach($tag);
        }


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
        $enlaces = Enlace::orderBy('created_at', 'desc')->paginate(10);

        return view('public.enlaces.show',
            [
                'enlace' => $enlace,
                'enlaces' => $enlaces,
            ]);
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

    protected function validacionAxios(UserAjaxFormRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }
}
