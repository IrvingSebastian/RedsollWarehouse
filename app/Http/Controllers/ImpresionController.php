<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function imprimir(Request $request){
        $seleccionados = $request->piezas;

        $piezas = Pieza::whereIn('id', $seleccionados)->get();

        $pdf = \PDF::loadView('impresion.pdf', compact('piezas'));
        return $pdf->download('documento.pdf');
    }
    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('impresion.selector')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'entrada' => $request->entrada,
            'salida' => $request->salida,
            'stock' => $request->stock,
        ));
        return redirect()->route('piezas.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
}
