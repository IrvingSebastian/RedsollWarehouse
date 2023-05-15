<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $pieza = Pieza::orderBy('updated_at', 'desc')->first();
        $piezasAgotadas = Pieza::where('stock', '<=', 0)->get();
        $piezasBajoStock = Pieza::where('stock', '<=', 5)->get();

        return view('home', compact('pieza', 'piezasAgotadas', 'piezasBajoStock'));
    }

}
