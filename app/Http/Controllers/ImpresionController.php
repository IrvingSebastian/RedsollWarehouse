<?php

namespace App\Http\Controllers;

use App\Models\P_Salidas;
use App\Models\Pieza;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function selector(Request $request){
        if (session()->has('piezas_select')){ //Si la sesión tiene el valor piezas_select 
            $piezasSelect = session('piezas_select'); //Asignar los valores de la session
            $nuevasPiezas = $request->input('piezas'); //Asignar los nuevos valores
    
            foreach ($nuevasPiezas as $id => $cantidad) {
                //Verificar que el ID no exista y la cantidad sea mayor a 0
                if (!isset($piezasSelect[$id]) && $cantidad > 0) {
                    $piezasSelect[$id] = $cantidad; //Añadir los valores
                }
            }
    
            session(['piezas_select' => $piezasSelect]); //Guardar la sesión
        }
        else {
            $piezasSelect = $request->input('piezas'); //Asignar los nuevos valores
            
            foreach ($piezasSelect as $id => $cantidad) { 
                //Verificar que la cantidad sea mayor a 0
                if ($cantidad == 0) {
                    unset($piezasSelect[$id]);
                }
            }

            session(['piezas_select' => $piezasSelect]); //Guardar la sesión piezas_select
        }
    
        return redirect()->back()
        ->with('success', 'Se añadieron las piezas a la selección.');    
    }

    public function borrar(){
        if (session()->has('piezas_select')){ //Si la sesión tiene el valor piezas_select

            session()->forget('piezas_select'); //Olvidar los datos

            return redirect()->back()
            ->with('success', 'Se borraron las piezas de la selección.');
        } else { //Si la sesión no tiene el valor piezas_select
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas.');
        }         
    }

    public function borrar1($id)
    {
        if (session()->has('piezas_select')) { //Si la sesión tiene el valor piezas_select
            
            $pro = Pieza::find($id); //Almacenar la pieza a borrar 

            session()->forget("piezas_select.$id"); //Olvidar la pieza de la sesión piezas_select
            session()->save();

            return redirect()->back()->with('success', 'Se borró la pieza ' . $pro->codigo . ' de la selección.');
        } else {
            return redirect()->back()->with('success', 'No hay piezas seleccionadas.');
        }
    }

    public function imprimir(){
        if (session()->has('piezas_select') ) { //Si la sesión tiene el valor piezas_select
            foreach (session('piezas_select') as $id => $cantidad) {
                $piezas[] = Pieza::find($id); //Guardar las piezas
                $cantidades[] = $cantidad; //Guardar las cantidades
            }

            $aux = 0; //Variable auxiliar

            foreach ($piezas as $pz) { //Ciclo para recorrer las piezas
                $cd = $cantidades[$aux]; 

                //Modificar los datos de la pieza
                $pz->stock -= $cd;
                $pz->salidas = $cd;
                $pz->save();

                //Crear un nuevo registro en la tabla P_Salidas
                $piezaNew = new P_Salidas();
                $piezaNew->id_pieza =  $pz->id;
                $piezaNew->id_user = Auth()->user()->id;
                $piezaNew->cantidad = $cd;
                $piezaNew->save();

                $aux++;
            }

            session()->forget('piezas_select'); //Olvidar los datos

            $fecha = date('d-m-Y'); //Guardar la fecha

            //Generar el PDF
            $pdf = \PDF::loadView('impresion.pdf', compact('piezas', 'cantidades', 'fecha'));
            return $pdf->download('documento.pdf');  
        } else {
            return redirect()->back()
            ->with('success', 'No hay piezas seleccionadas.');
        }         
    }

    public function visualizar(){
        if (session('piezas_select')) { //Si la sesión tiene el valor piezas_select
            foreach (session('piezas_select') as $id => $cantidad) {
                $piezas[] = Pieza::find($id); //Asignar las piezas
                $cantidades[] = $cantidad; //Asignar las cantidades
            }

            return view('impresion.seleccion', compact('piezas', 'cantidades'));  
        } else {
            $piezas = []; //Retornar un arreglo vacio

            return view('impresion.seleccion', compact('piezas'))
                ->with('success', 'No hay piezas seleccionadas.');
        } 
    }
}
