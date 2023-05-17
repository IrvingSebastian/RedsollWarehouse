<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PiezaNew;
use App\Models\Pieza;
use App\Models\User;

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
        $pz1 = PiezaNew::where('entrada', 1)->latest()->take(5)->pluck('pieza_id');

        $pz2 = PiezaNew::where('salida', 1)->latest()->take(5)->pluck('pieza_id');

        $piezasAgotadas = Pieza::where('stock', '<=', 0)->get();
        $piezasBajoStock = Pieza::where('stock', '<=', 5)
            ->where('stock', '>', 0)
            ->get();

        $piezas1 = Pieza::whereIn('id', $pz1)->get();
        $piezas2 = Pieza::whereIn('id', $pz2)->get();

        return view('home', compact('piezasAgotadas', 'piezasBajoStock', 'piezas1', 'piezas2'));
    }

    public function home2()
    {
        $ad = PiezaNew::where('entrada', 1)
            ->pluck('user_id')
            ->unique();

        $inst = PiezaNew::where('salida', 1)
            ->pluck('user_id')
            ->unique(); 

        $admins = PiezaNew::whereIn('user_id', $ad)->get();

        $instalers = PiezaNew::whereIn('user_id', $inst)->get();

        return view('home2', compact('admins', 'instalers'));
    }
}
