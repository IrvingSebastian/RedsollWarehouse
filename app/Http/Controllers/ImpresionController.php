<?php

namespace App\Http\Controllers;

use App\Models\P_Salidas;
use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        $piezasSelect = $request->input('piezas');

        foreach ($piezasSelect as $id => $cantidad) {
            if ($cantidad == 0) {
                unset($piezasSelect[$id]);
            }
        }

        session(['piezas_select' => $piezasSelect]);

        return redirect()->back()
        ->with('success', 'Se añadieron las piezas a la selección.');    
    }

    public function borrar(){
        if (session()->has('piezas_select')){

            session()->forget('piezas_select');

            return redirect()->back()
            ->with('success', 'Se borraron las piezas de la selección.');
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas.');
        }         
    }

    public function borrar1($id)
    {
        if (session()->has('piezas_select')) {
            
            $pro = Pieza::find($id);

            session()->forget("piezas_select.$id");
            session()->save();

            return redirect()->back()->with('success', 'Se borró la pieza ' . $pro->codigo . ' de la selección.');
        } else {
            return redirect()->back()->with('success', 'No hay piezas seleccionadas.');
        }
    }

    public function imprimir(){
        if (session()->has('piezas_select') ) {
        
            foreach (session('piezas_select') as $id => $cantidad) {
                $piezas[] = Pieza::find($id);
                $cantidades[] = $cantidad;
            }

            $aux = 0;

            foreach ($piezas as $pz) {
                $cd = $cantidades[$aux]; 

                $pz->stock -= $cd;
                $pz->salidas = $cd;
                $pz->save();

                $piezaNew = new P_Salidas();
                $piezaNew->id_pieza =  $pz->id;
                $piezaNew->id_user = Auth()->user()->id;
                $piezaNew->cantidad = $cd;
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
            ->with('success', 'No hay piezas seleccionadas.');
        }         
    }

    public function visualizar(){
        if (session('piezas_select')) {
            
            foreach (session('piezas_select') as $id => $cantidad) {
                $piezas[] = Pieza::find($id);
                $cantidades[] = $cantidad;
            }

            return view('impresion.seleccion', compact('piezas', 'cantidades'));  
        } else {
            $piezas = [];

            return view('impresion.seleccion', compact('piezas'))
                ->with('success', 'No hay piezas seleccionadas.');
        } 
    }
}
