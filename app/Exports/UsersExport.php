<?php

namespace App\Exports;

use App\Models\Pieza;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /*
    *@return \Illuminate\Support\Collection
    */

    public function headings(): array{
        return ['id','codigo','descripcion',];
    }
    
    public function collection(){
        $piezas = Pieza::select('id','codigo','descripcion')->get();
        return $piezas;
    }
}