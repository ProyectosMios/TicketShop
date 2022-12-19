@extends('layouts.app')

@section('content')
<main class="my-8">
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <h3 class="text-3xl text-bold">Compra conciertos</h3>
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-center">Nombre</th>
                            <th class="pl-5 text-center lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Cantidad</span>
                            </th>
                            <th class="hidden text-center md:table-cell"> Precio</th>
                            <th class="hidden text-center md:table-cell"> Eliminar </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ Storage::url($item->urlfoto) }}" class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>                  
                                    </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="h-10 w-full">
                                        <div class="relative flex flex-row justify-center w-full h-8">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}" >
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-20 text-center bg-gray-300" />
                                                <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-center md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        {{ $item->price }}€
                                    </span>
                                </td>
                                <td class="hidden text-center md:table-cell">
                                    <form action="{{ route('cart.removeitem') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="px-4 py-2 text-white bg-red-600">x</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                    <div class="text-right lg:text-3xl md:text-md xs:text-xs">
                        Total: {{ Cart::getTotal() }}€
                    </div>
                    <div class=" flex flex_row justify-around">
                        <div class="text-center">
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="px-6 py-2 text-red-800 bg-red-300">Vaciar carrito</button>
                            </form>
                        </div>
                        <div class="text-center">
                            <a class="bg-white text-blue-500 hover:text-blue-800 font-semibold" href="{{ url('/paypal/pay') }}">
                                Paypal
                            </a>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection