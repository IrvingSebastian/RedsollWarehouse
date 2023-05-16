<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\PiezaNew;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $piezas1 = $request->input('piezas');
        $cantidades1 = $request->input('cantidades');

        $piezasAux = Pieza::find($piezas1);

        foreach($cantidades1 as $key => $cantidad){
            if($cantidad <= 0 || $cantidad == null || $cantidad > $piezasAux[$key]->stock){
                return redirect()->back()
                ->with('success', 
                'No se pueden seleccionar cantidades negativas, cero o mayores al stock.');
            }
            if(session()->has('piezas_select')){
                foreach (session('piezas_select') as $pieza) {
                    foreach ($pieza as $pieza1) {
                        if($pieza1 == $piezas1[$key]){
                            return redirect()->back()
                            ->with('success', 
                            'No se pueden seleccionar cantidades de piezas ya elegidas.');
                        }
                    }
                }
            }
        }

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
        
            foreach (session('piezas_select') as $pieza) {
                foreach ($pieza as $pieza1) {
                    $piezas[] = Pieza::find($pieza1);
                }
            }
            
            foreach (session('cantidades_select') as $cantidad) {
                foreach ($cantidad as $cantidad1){
                    $cantidades[] = $cantidad1;
                }             
            }

            $aux = 0;

            foreach ($piezas as $pz) {
                $cd = $cantidades[$aux]; 

                $pz->stock -= $cd;
                $pz->entradas -= $cd;
                $pz->salidas += $cd;
                $pz->save();

                $piezaNew = new PiezaNew();
                $piezaNew->pieza_id = $pz->id;
                $piezaNew->entrada = false;
                $piezaNew->salida = true;
                $piezaNew->save();

                $aux++;
            }

            session()->forget('piezas_select');
            session()->forget('cantidades_select');

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
