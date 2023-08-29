<?php

namespace App\Exports;

use App\Models\P_Entradas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntradaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Escribir aqui la lógica para obtener las entradas
          // Obtener todas las devoluciones
          $Entradas = P_Entrada::with('pieza:id,codigo,descripcion')
          ->select('id_pieza', 'cantidad', 'created_at')
          ->get();

      // Formatear la colección para que se muestren los datos que se desean
      $formattedDevoluciones = $devoluciones->map(function ($devolucion) {
          return [
              'id_pieza' => $devolucion->id_pieza, // Acceder al atributo 'id_pieza
              'codigo_pieza' => $devolucion->pieza->codigo, // Acceder al atributo 'codigo' de la relación 'pieza'
              'descripcion' => $devolucion->pieza->descripcion, // Acceder al atributo 'descripcion' de la relación 'pieza'
              'cantidad' => $devolucion->cantidad, // Acceder al atributo 'cantidad'
              'created_at' => $devolucion->created_at, // Acceder al atributo 'created_at'         
          ];
      });

      return $formattedDevoluciones;
    }

    public function headings(): array
    {
        return ['ID', 'Codigo', 'Descripcion', 'Cantidad', 'Fecha'];
    }
}
