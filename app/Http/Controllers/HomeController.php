<?php

namespace App\Http\Controllers;

use App\Enlace;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        $enlaces = Enlace::orderBy('created_at', 'desc')->paginate(10);

        return view('home', [
            'enlaces' => $enlaces
        ]);
    }
}
