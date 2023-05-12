<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $seleccionados = $request->input('piezas');

        session()->push('piezas_seleccionadas', $seleccionados);

        return redirect()->back()
            ->with('success', 'Los datos fueron agregados de manera exitosa');
    }

    public function imprimir(){
        $seleccionados = session('piezas_seleccionadas');

        // Verificar si la variable de sesión "cart" existe
        if (session()->has('piezas_seleccionadas')) {
            $piezas = Pieza::whereIn('id', $seleccionados)->get();       
            $pdf = \PDF::loadView('impresion.pdf', compact('piezas'));
            return $pdf->download('documento.pdf');
        } else {
            return redirect()->back();
        }    
    }
}
