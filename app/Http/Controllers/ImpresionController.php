<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function imprimir(){
        $piezas = Pieza::paginate();
        $pdf = \PDF::loadView('impresion.pdf', compact('piezas'));
        return $pdf->download('documento.pdf');
    }
}
