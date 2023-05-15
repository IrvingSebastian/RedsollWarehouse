<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $piezas1 = $request->input('piezas');
        $cantidades1 = $request->input('cantidades');

        session()->push('piezas_select', $piezas1);
        session()->push('cantidades_select', $cantidades1);
    
        return redirect()->back()
            ->with('success', 'Se añadieron las piezas a la selección');
    }

    public function borrar(){
        if (session()->has('piezas_select') && session()->has('cantidades_select')) {

            session()->forget('piezas_select');
            session()->forget('cantidades_select');

            return redirect()->back()
            ->with('success', 'Se borraron las piezas de la selección');
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas');
        }         
    }

    public function imprimir(){
        if (session()->has('piezas_select') && session()->has('cantidades_select')) {
            foreach (session('cantidades_select') as $cantidad) {
                foreach ($cantidad as $cantidad1) {
                    $cantidades[] = $cantidad1;
                }
            }

            foreach ($cantidades as $cant){
                Pieza::where('id', $cant)->decrement('entradas', $cantidad1);
                Pieza::where('id', $cant)->increment('salidas', $cantidad1);
                Pieza::where('id', $cant)->decrement('stock', $cantidad1);
            }

            foreach (session('piezas_select') as $pieza) {
                foreach ($pieza as $pieza1) {
                    $piezas[] = Pieza::find($pieza1);
                }
            }

            $fecha = date('d-m-Y');

            $pdf = \PDF::loadView('impresion.pdf', compact('piezas', 'cantidades', 'fecha'));
            return $pdf->download('documento.pdf');  
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas');
        }         
    }

    public function visualizar(){
        if (session()->has('piezas_select') && session()->has('cantidades_select')) {
            foreach (session('piezas_select') as $pieza) {
                foreach ($pieza as $pieza1) {
                    $piezas[] = Pieza::find($pieza1);
                }
            }
            foreach (session('cantidades_select') as $cantidad) {
                foreach ($cantidad as $cantidad1) {
                    $cantidades[] = $cantidad1;
                }
            }

            return view('impresion.seleccion', compact('piezas', 'cantidades'));  
        } else {
            $piezas = [];

            return view('impresion.seleccion', compact('piezas'))
                ->with('success', 'No hay piezas seleccionadas');
        } 
    }
}
