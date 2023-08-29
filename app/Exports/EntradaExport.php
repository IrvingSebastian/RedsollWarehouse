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
    }

    public function headings(): array
    {
        return ['ID', 'Codigo', 'Descripcion', 'Cantidad', 'Fecha'];
    }
}
