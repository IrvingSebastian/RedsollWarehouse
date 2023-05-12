<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $piezas1 = $request->input('piezas');

        session()->put('piezas_s', $piezas1);
        session()->push('piezas_select', $piezas1);

        $piezas2 = implode(", ", session('piezas_s'));
    
        return redirect()->back()
            ->with('success', 'Los datos fueron agregados de manera exitosa. Piezas seleccionadas: '. $piezas2);
    }

    public function imprimir(){
        return redirect()->back()
            ->with('success', 'Los datos son..');;
    }
}
