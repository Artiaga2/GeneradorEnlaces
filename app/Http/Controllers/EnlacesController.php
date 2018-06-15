<?php

namespace App\Http\Controllers;

use App\Enlace;
use App\Http\Requests\CreateEnlaceAjaxRequest;
use App\Http\Requests\CreateEnlaceRequest;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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


        return redirect('/admin/enlaces');
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

        return view('admin.enlaces.show',
            [
                'enlace' => $enlace,
                'enlaces' => $enlaces,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enlace  $enlace
     * @return string
     */
    public function edit(Enlace $enlace)
    {
        if( Gate::allows('canEdit', $enlace) ) {
            return view('admin.enlaces.edit', [
                'enlace' => $enlace,
                'tags' => $enlace->tags->pluck('nombre')->implode(', ')
            ]);
        }

        return "No se puede editar";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function patch(Request $request, Enlace $enlace)
    {

        $enlace->fill([
            'titulo'        => $request->input('titulo'),
            'slug' => str_slug(\request('titulo')),
            'uri'           => $request->input('uri'),
            'tipo'          => $request->input('tipo'),
            'descripcion'   => $request->input('descripcion'),
            'privacidad'    => $request->input('privacidad'),

        ]);

        $tags = explode(", ",\request('tags'));
        //dd($tags);
        $newTags = [];
        foreach ($tags as $tag){
            $tag = Tag::firstOrCreate([
                'nombre' => $tag,
                'slug' => str_slug($tag)
            ]);
            array_push($newTags, $tag);
        }

        //dd(collect($newTags)->pluck('id')->toArray());

        $enlace->tags()->sync(collect($newTags)->pluck('id')->toArray());

        $enlace->update();

        return redirect('admin/enlaces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Auth::user();

        $enlace = Enlace::where('id', $id)->first();

        if ($enlace != null) {

            $enlace = Enlace::find($id)->delete();

        }

        return 1;
    }

    public function mostrarDatos()
    {
        return view('admin.data.mostrar_datos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enlace  $enlaces
     */


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function mostrarDatosAjax()
    {
        $enlaces = Enlace::all();
        return $enlaces;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function mostrarAjaxUno(Request $request)
    {
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $enlaces = DB::table("enlaces")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();
        return $enlaces;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostrarVista(Request $request){
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $enlaces = DB::table("enlaces")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();

        $vista = view('enlaces.index', ['enlaces' => $enlaces]);

        return $vista;

    }

    public function validateEnlaceAjax(CreateEnlaceAjaxRequest $request)
    {
        //Obtenemos todos los valores y devolvemos un array vacío.
        return array();
    }
}
