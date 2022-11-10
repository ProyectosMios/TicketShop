<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concierto;
use App\Models\Provincia;
use App\Models\Artista;

use Carbon\Carbon;

class ConciertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaActual = Carbon::now();
        $conciertos = Concierto::where('fechacelebracion','>=',$diaActual)->oldest('fechacelebracion')->paginate(10);
        $provincias = Provincia::all();
        $artistas = Artista::all();
        return view('conciertos.listar_conciertos',compact("conciertos","provincias","artistas"));
    }

    public function show(Concierto $concierto){
        return view('conciertos.show',compact('concierto'));
    }
}
