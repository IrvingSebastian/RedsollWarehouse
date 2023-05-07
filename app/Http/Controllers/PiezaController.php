<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

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

        return redirect()->route('piezas.index')
            ->with('success', 'Pieza created successfully.');
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

        return redirect()->route('piezas.index')
            ->with('success', 'Pieza updated successfully');
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
            ->with('success', 'Pieza deleted successfully');
    }
}
