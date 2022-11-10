<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concierto;
use App\Models\Provincia;
use App\Models\Artista;

use Carbon\Carbon;

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
        $diaActual = Carbon::now();
        $diaFinal = Carbon::now()->addDay(7);
        $conciertos = Concierto::whereBetween('fechacelebracion',[$diaActual, $diaFinal])->oldest('fechacelebracion')->paginate(10);
        $provincias = Provincia::all();
        $artistas = Artista::all();
        return view('home',compact("conciertos","provincias","artistas"));
    }
}
