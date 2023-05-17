<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\PiezaNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PiezaController
 * @package App\Http\Controllers
 */
class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piezas = Pieza::paginate();

        return view('pieza.index', compact('piezas'))
            ->with('i', (request()->input('page', 1) - 1) * $piezas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieza = new Pieza();
        return view('pieza.create', compact('pieza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pieza::$rules);

        $pieza = Pieza::create($request->all());
        $piezaNew = new PiezaNew();
        $piezaNew->pieza_id = $pieza->id;
        $piezaNew->codigo = Auth()->user()->name;
        $piezaNew->entrada = true;
        $piezaNew->salida = false;
        $piezaNew->save();
        return redirect()->route('piezas.index')
            ->with('success', 'Los datos han sido creados de manera exitosa.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pieza = Pieza::find($id);

        return view('pieza.show', compact('pieza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pieza = Pieza::find($id);

        return view('pieza.edit', compact('pieza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pieza $pieza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pieza $pieza)
    {
        request()->validate(Pieza::$rules);

        $pieza->update($request->all());

        $piezaNew = new PiezaNew();
        $piezaNew->pieza_id = $pieza->id;
        $piezaNew->codigo = Auth()->user()->name;
        $piezaNew->entrada = true;
        $piezaNew->salida = false;
        $piezaNew->save();

        return redirect()->route('piezas.index')
            ->with('success', 'Se han actualizado los datos.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pieza = Pieza::find($id)->delete();

        return redirect()->route('piezas.index')
            ->with('success', 'La pieza ha sido eliminada de manera exitosa.');
    }

    /**
     * Search the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $texto = ($request->get('texto'));
        $piezas = DB::table('piezas')->select('id','codigo','descripcion','entradas','salidas','stock')
            ->where('descripcion','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(50);
         
        return view('pieza.index', compact('piezas','texto'));
    }
}
