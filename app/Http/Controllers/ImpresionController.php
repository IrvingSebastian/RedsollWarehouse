<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $piezas1 = $request->input('piezas');

        session()->push('piezas_select', $piezas1);
    
        return redirect()->back()
            ->with('success', 'Se añadieron las piezas a la selección');
    }

    public function borrar(){
        if (session()->has('piezas_select')) {
            session()->forget('piezas_select');
            return redirect()->back()
            ->with('success', 'Se borraron las piezas de la selección');
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas');
        }         
    }

    public function imprimir(){
        if (session()->has('piezas_select')) {
            foreach (session('piezas_select') as $pieza) {
                foreach ($pieza as $pieza1) {
                    $piezas[] = Pieza::find($pieza1);
                }
            }
            $pdf = \PDF::loadView('impresion.pdf', compact('piezas'));
            return $pdf->download('documento.pdf');  
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas');
        }         
    }

    public function visualizar(){
        if (session()->has('piezas_select')) {
            foreach (session('piezas_select') as $pieza) {
                foreach ($pieza as $pieza1) {
                    $piezas[] = Pieza::find($pieza1);
                }
            }
            return view('impresion.seleccion', compact('piezas'));  
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas');
        } 
    }
}
