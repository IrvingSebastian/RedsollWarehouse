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
}
