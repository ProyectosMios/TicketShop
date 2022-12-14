<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concierto;

class BusquedaController extends Controller
{
    public function conciertos(Request $request){
        $termino = $request->get("termino");

        $busquedas = Concierto::where('nombre','LIKE','%'.$termino.'%')->get();

        $datos = [];

        foreach ($busquedas as $busqueda) {
            $datos[] = [
                'label' => $busqueda->nombre
            ];
        }

        return $datos;
    }
}
