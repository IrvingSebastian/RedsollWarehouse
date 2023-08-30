<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pieza;
use App\Models\P_Entradas;
use SimpleXMLElement;

class ImportController extends Controller
{
    public function procesarXML(Request $request)
    {
        if ($request->hasFile('xmlFile')) {
            $xmlFile = $request->file('xmlFile');

            $xml = new SimpleXMLElement(file_get_contents($xmlFile->getRealPath()));

            foreach ($xml->Concepto as $concepto) {
                $codigo = (string) $concepto['ClaveProdServ'];
                $descripcion = (string) $concepto['Descripcion'];
                $cantidad = (float) $concepto['Cantidad'];

                // Verificar si la pieza ya existe por el código
                $pieza = Pieza::where('codigo', $codigo)->first();
                if (!$pieza) {
                    // Si no existe, crea una nueva
                    $pieza = new Pieza();
                    $pieza->codigo = $codigo;
                }

                $pieza->descripcion = $descripcion;

                // Lógica de entradas y stock
                if ($pieza->exists) {
                    // Si la pieza ya existe, actualiza el stock y las entradas
                    $pieza->stock = $pieza->stock + $cantidad;
                    $pieza->entradas = $cantidad;

                    // Crea un registro de entrada en P_Entradas
                    $piezaNew = new P_Entradas();
                    $piezaNew->id_pieza = $pieza->id;
                    $piezaNew->id_user = Auth()->user()->id;
                    $piezaNew->cantidad = $cantidad;
                    $piezaNew->save();

                } else {
                    // Si la pieza es nueva, inicializa el stock y las entradas
                    $pieza->stock = $cantidad;
                    $pieza->entradas = $cantidad;

                    // Crea un registro de entrada en P_Entradas
                    $piezaNew = new P_Entradas();
                    $piezaNew->id_pieza = $pieza->id;
                    $piezaNew->id_user = Auth()->user()->id;
                    $piezaNew->cantidad = $cantidad;
                    $piezaNew->save();
                }
                $pieza->save(); // Guarda los cambios en la base de datos
            }

            // Redirecciona a la página anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'XML procesado correctamente.');
        }

        // Redirecciona a la página anterior con un mensaje de error
        return redirect()->back()->with('error', 'No se ha proporcionado un archivo XML.');
    }
}
