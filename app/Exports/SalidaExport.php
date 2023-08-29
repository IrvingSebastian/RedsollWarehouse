<?php

namespace App\Exports;

use App\Models\P_Salidas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalidaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Escribir aqui la lógica para obtener las salidas
    }

    public function headings(): array
    {
        return ['ID', 'Codigo', 'Descripcion', 'Cantidad', 'Fecha'];
    }
}
