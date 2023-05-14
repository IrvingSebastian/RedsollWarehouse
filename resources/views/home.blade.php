@extends('layouts.app')

@section('content')
<section class="banner_main">
    <div id="banner1" class="carousel slide" data-ride="carousel">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                <div class="text-bg">
                    <h2 style="font-size:50mm">Redsoll Warehouse</h2>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <table class="table table-striped table-hover" style="font-size: small">
                        <thead class="thead">
                            <tr>
                                <th>ID Pieza</th>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Entradas</th>
                                <th>Salidas</th>
                                <th>Stock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pieza->id }}</td>
                                <td>{{ $pieza->codigo }}</td>
                                <td>{{ $pieza->descripcion }}</td>
                                <td>{{ $pieza->entradas }}</td>
                                <td>{{ $pieza->salidas }}</td>
                                <td>{{ $pieza->stock }}</td>
                                <td>
                                    @if (Auth::user()->rol == "Administrador")
                                    <form action="{{ route('piezas.destroy', $pieza->id) }}" method="POST">
                                        <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$pieza->id) }}">
                                            <i class="fa fa-fw fa-edit"></i> Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="font-size: small">
                                            <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                    </form>
                                        
                                    @else
                                        <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> Mostrar</a>  
                                        
                                        <br>    
                                    @endif     
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
