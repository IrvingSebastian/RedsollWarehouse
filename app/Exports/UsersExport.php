<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    
@return \Illuminate\Support\Collection*/
  public function headings(): array{
      return ['id','codigo','descripcion',];}
  public function collection(){$users = DB::table('piezas')->select('id','codigo', 'descripcion')->get();
       return $users;

    }
}