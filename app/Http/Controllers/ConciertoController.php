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
    public function index(Request $request)
    {
        $buscar = $request->busqueda;
        $diaActual = Carbon::now();
        $conciertos = Concierto::where('fechacelebracion','>=',$diaActual)
                                ->where('nombre','LIKE','%'.$buscar.'%')
                                ->latest('fechacelebracion')
                                ->paginate(10);
        $provincias = Provincia::all();
        $artistas = Artista::all();
        return view('conciertos.listar_conciertos',compact("conciertos","provincias","artistas"));
    }

    public function show(Concierto $concierto){
        return view('conciertos.show',compact('concierto'));
    }

    public function showConciertos(Artista $artista){
        $conciertos = Concierto::where('fechacelebracion','>=',$diaActual,'and','artista_id','=',$artista->id())->latest('fechacelebracion')->paginate(10);
        return view('conciertos.showconciertos',compact('conciertos'));
    }
}
