<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pieza;
use App\Models\P_Entradas;
use App\Models\P_Salidas;
use App\Models\P_Devoluciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Función de la vista raiz
    public function raiz()
    {
        if (auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Instalador') {
            return redirect()->route('home');
        }
        else if (auth()->user()->rol == 'Jefe de Almacen') {
            return redirect()->route('home2');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $piezas1 = P_Entradas::latest()->first();
        $piezas2 = P_Salidas::latest()->first();
        $piezasAgotadas = Pieza::where('stock', '<=', 0)->get();
        $piezasBajoStock = Pieza::where('stock', '<=', 5)
            ->where('stock', '>', 0)
            ->get();

        return view('home', compact('piezas1', 'piezas2', 'piezasAgotadas', 'piezasBajoStock'));
    }

    public function home2()
    {
        $admins = P_Entradas::latest()->first();
        $admins2 = P_Salidas::latest()->first();
        $instalers = P_Devoluciones::latest()->first();

        return view('home2', compact('admins', 'admins2', 'instalers'));
    }
}
