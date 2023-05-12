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

    public function add($id){
        $pieza = Pieza::find($id);

        \Cart::add(array(
            'id' => $pieza->id,
            'codigo' => $pieza->codigo,
            'descripcion' => $pieza->descripcion,
            'entrada' => $pieza->entrada,
            'salida' => $pieza->salida,
            'stock' => $pieza->stock,
        ));

        return redirect()->route('piezas.index')
            ->with('success', 'Los datos han sido creados de manera exitosa.');
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
