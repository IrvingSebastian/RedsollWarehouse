@extends('layouts.app')

@section('content')
<section class="banner_main">
    <div id="banner1" class="carousel slide" data-ride="carousel">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                <div class="text-bg">
                    <h2 style="font-size:50mm">Redsoll</h2>
                    <h3 style="font-size:25mm">Tecnología para todos</h3>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>

@if (Auth::user()->rol == "Administrador")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        ÚLtima pieza que salió
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
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Piezas agotadas
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
                                @foreach ($piezasAgotadas as $piezaAgotada )
                                    <tr>
                                        <td>{{ $piezaAgotada->id }}</td>
                                        <td>{{ $piezaAgotada->codigo }}</td>
                                        <td>{{ $piezaAgotada->descripcion }}</td>
                                        <td>{{ $piezaAgotada->entradas }}</td>
                                        <td>{{ $piezaAgotada->salidas }}</td>
                                        <td>{{ $piezaAgotada->stock }}</td>
                                        <td>
                                            <form action="{{ route('piezas.destroy', $piezaAgotada->id) }}" method="POST">
                                                <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$piezaAgotada->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$piezaAgotada->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="font-size: small">
                                                    <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                            </form>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Piezas por agotarse
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
                                @foreach ($piezasBajoStock as $piezaBajoStock )
                                    <tr>
                                        <td>{{ $piezaBajoStock->id }}</td>
                                        <td>{{ $piezaBajoStock->codigo }}</td>
                                        <td>{{ $piezaBajoStock->descripcion }}</td>
                                        <td>{{ $piezaBajoStock->entradas }}</td>
                                        <td>{{ $piezaBajoStock->salidas }}</td>
                                        <td>{{ $piezaBajoStock->stock }}</td>
                                        <td>
                                            <form action="{{ route('piezas.destroy', $piezaBajoStock->id) }}" method="POST">
                                                <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$piezaBajoStock->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$piezaBajoStock->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="font-size: small">
                                                    <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                            </form>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
