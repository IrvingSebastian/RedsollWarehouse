<?php

namespace App\Exports;

use App\Models\P_Salidas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class SalidaExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Escribir aqui la lógica para obtener las salidas
          // Obtener todas las devoluciones
          $salidas = P_Salidas::with('pieza:id,codigo,descripcion')
          ->select('id_pieza', 'cantidad', 'created_at')
          ->get();

      // Formatear la colección para que se muestren los datos que se desean
      $formattedDevoluciones = $salidas->map(function ($devolucion) {
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

    public function title(): string
    {
        return "Salidas";
    }
}
