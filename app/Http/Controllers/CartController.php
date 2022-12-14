<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Concierto;

class CartController extends Controller
{
    
    public function add(Request $request){
       
        $concierto = Concierto::find($request->concierto_id);

        Cart::add(
            $concierto->id, 
            $concierto->nombre, 
            $concierto->precio, 
            1,
            array("urlfoto"=>$concierto->imagen->direccion)
           
        );
        return back()->with('success',"$concierto->nombre ¡se ha agregado con éxito al carrito!");
   
    }

    public function cart(){
        
        return view('cart.checkout');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        //session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.checkout');
    }

    public function removeitem(Request $request) {
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Concierto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return redirect()->route('concierto.index');
    }

}
