<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PiezaNew;
use App\Models\Pieza;

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
        return redirect()->route('home');
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
        $piezasBajoStock = Pieza::where('stock', '<=', 5)->get();

        $piezas1 = Pieza::whereIn('id', $pz1)->get();
        $piezas2 = Pieza::whereIn('id', $pz2)->get();

        return view('home', compact('piezasAgotadas', 'piezasBajoStock', 'piezas1', 'piezas2'));
    
    }

    public function home2()
    {
    $pz1 = PiezaNew::where('entrada', 1)->latest()->take(5)->pluck('pieza_id');
    $pz2 = PiezaNew::where('salida', 1)->latest()->take(5)->pluck('pieza_id');

    $piezaIds = PiezaNew::whereIn('user_id', $pz1)->pluck('pieza_id')->toArray();
    $piezaIds = PiezaNew::whereIn('user_id', $pz2)->pluck('pieza_id')->toArray();

    $piezas1 = Pieza::whereIn('id', $pz1)->latest()->get();
    $piezas2 = Pieza::whereIn('id', $pz2)->latest()->get();

    }
       

}
