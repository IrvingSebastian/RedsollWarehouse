<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export(){
        return Excel::download(new UsersExport, 'piezas.xlsx');
    }
}
