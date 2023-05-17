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
                        Últimas piezas que entraron
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
                                @if($piezas1 != null)
                                @foreach ($piezas1 as $pieza1 )
                                <tr>
                                    <td>{{ $pieza1->id }}</td>
                                    <td>{{ $pieza1->codigo }}</td>
                                    <td>{{ $pieza1->descripcion }}</td>
                                    <td>{{ $pieza1->entradas }}</td>
                                    <td>{{ $pieza1->salidas }}</td>
                                    <td>{{ $pieza1->stock }}</td>
                                    <td>
                                        <form action="{{ route('piezas.destroy', $pieza1->id) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza1->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$pieza1->id) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="font-size: small">
                                                <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                        </form>       
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">No hay piezas</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Últimas piezas que salieron
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
                                @if($piezas2 != null)
                                @foreach ($piezas2 as $pieza2 )
                                <tr>
                                    <td>{{ $pieza2->id }}</td>
                                    <td>{{ $pieza2->codigo }}</td>
                                    <td>{{ $pieza2->descripcion }}</td>
                                    <td>{{ $pieza2->entradas }}</td>
                                    <td>{{ $pieza2->salidas }}</td>
                                    <td>{{ $pieza2->stock }}</td>
                                    <td>
                                        <form action="{{ route('piezas.destroy', $pieza2->id) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza2->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$pieza2->id) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="font-size: small">
                                                <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                        </form>       
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">No hay piezas</td>
                                </tr>
                                @endif
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
