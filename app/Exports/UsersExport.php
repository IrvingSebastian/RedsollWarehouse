<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersExport implements WithMultipleSheets
{
    use Exportable;

    //Función que retorna un array de hojas de cálculo
    public function sheets(): array
    {
        $sheets = []; //Array de hojas de cálculo
        
        $sheets[] = new EntradaExport(); //Añadir hoja de cálculo de entradas

        $sheets[] = new SalidaExport(); //Añadir hoja de cálculo de salidas

        $sheets[] = new DevolucionExport(); //Añadir hoja de cálculo de devoluciones

        return $sheets; //Retornar array de hojas de cálculo
    }
}