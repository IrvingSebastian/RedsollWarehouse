@extends('layouts.app')

@section('template_title')
    Pieza
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Pieza
                            </span>
                            <div class="float-right">
                                <a href="{{route('piezas.index')}}" class="btn btn-primary btn-sm mt-2" style="font-size: small">
                                    <i class="fa fa-fw fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="font-size: small">
                                <thead class="thead">
                                    <tr>
                                        <th>ID Pieza</th>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Entradas</th>
                                        <th>Salidas</th>
                                        <th>Stock</th>
                                        <th>Cantidad Elegida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($piezas) > 0)
                                    @foreach ($piezas as $key => $pieza)
                                    <tr>
                                        <td>{{ $pieza->id }}</td>
                                        <td>{{ $pieza->codigo }}</td>
                                        <td>{{ $pieza->descripcion }}</td>
                                        <td>{{ $pieza->entradas }}</td>
                                        <td>{{ $pieza->salidas }}</td>
                                        <td>{{ $pieza->stock }}</td>
                                        <td>{{ $cantidades[$key] }}</td>
                                    </tr>
                                    @endforeach                
                                    @else
                                        <tr>
                                            <td colspan="7">No hay resultados</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div style="text-align:right">
                                <a href="{{ route('selector.borrar') }}" class="btn btn-danger btn-sm" style="font-size:small">
                                    <i class="fa fa-fw fa-trash-o"></i> Borrar toda la selección
                                </a>
                                <a href="{{ route('selector.imprimir') }}" class="btn btn-success btn-sm" style="font-size:small">
                                    <i class="fa fa-fw fa-print"></i> Imprimir selección
                                </a>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

