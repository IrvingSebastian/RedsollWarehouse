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

@if (Auth::user()->rol == "Jefe de Almacen")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                Administradores que editaron piezas
                @if($admins == null)
                    <div class="card">
                        <div class="card-header">
                            No hay registros
                        </div>
                    </div>
                @else
                    @foreach ($admins as $admin)
                        @if($admin->entradas->isEmpty())

                        @else
                            <div class="card">
                                <div class="card-header">
                                    {{$admin->name}}
                                    <table class="table table-striped table-hover" style="font-size: small">
                                        <thead class="thead">
                                            <tr>
                                                <th>ID Pieza</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Entradas</th>
                                                <th>Fecha de Modificación</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admin->entradas as $entrada)
                                                <tr>
                                                    <td>{{$entrada->pieza->id}}</td>
                                                    <td>{{$entrada->pieza->codigo}}</td>
                                                    <td>{{$entrada->pieza->descripcion}}</td>
                                                    <td>{{$entrada->pieza->entradas}}</td>
                                                    <td>{{$entrada->pieza->updated_at}}</td>
                                                    <td>
                                                        <form action="{{ route('piezas.destroy', $entrada->pieza->id) }}" method="POST">
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$entrada->pieza->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>       
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <br>
                <br>
                Administradores que devolvieron piezas
                @if($admins2 == null)
                    <div class="card">
                        <div class="card-header">
                            No hay registros
                        </div>
                    </div>
                @else
                    @foreach ($admins2 as $admin)
                        @if($admin->devoluciones->isEmpty())

                        @else
                            <div class="card">
                                <div class="card-header">
                                    {{$admin->name}}
                                    <table class="table table-striped table-hover" style="font-size: small">
                                        <thead class="thead">
                                            <tr>
                                                <th>ID Pieza</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Devolucion</th>
                                                <th>Fecha de Modificación</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($admin->devoluciones as $devolucion)
                                                <tr>
                                                    <td>{{ $devolucion->pieza->id }}</td>
                                                    <td>{{ $devolucion->pieza->codigo }}</td>
                                                    <td>{{ $devolucion->pieza->descripcion }}</td>
                                                    <td>{{ $devolucion->pieza->devolucion }}</td>
                                                    <td>{{ $devolucion->pieza->updated_at }}</td>
                                                    <td>
                                                        <form action="{{ route('piezas.destroy', $devolucion->pieza->id ) }}" method="POST">
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$devolucion->pieza->id ) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>       
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                <br>
                <br>
                Instaladores que sacaron piezas
                @if($instalers == null)
                    <div class="card">
                        <div class="card-header">
                            No hay registros
                        </div>
                    </div>
                @else
                    @foreach ($instalers as $instaler)
                        @if($instaler->salidas->isEmpty())

                        @else
                            <div class="card">
                                <div class="card-header">
                                    {{$instaler->name}}
                                    <table class="table table-striped table-hover" style="font-size: small">
                                        <thead class="thead">
                                            <tr>
                                                <th>ID Pieza</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Salidas</th>
                                                <th>Fecha de Actualización</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instaler->salidas as $salida)
                                                <tr>
                                                    <td>{{$salida->pieza->codigo}}</td>
                                                    <td>{{$salida->pieza->id}}</td>
                                                    <td>{{$salida->pieza->descripcion}}</td>
                                                    <td>{{$salida->pieza->salidas}}</td>
                                                    <td>{{$salida->pieza->updated_at}}</td>
                                                    <td>
                                                        <form action="{{ route('piezas.destroy', $salida->pieza->id) }}" method="POST">
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$salida->pieza->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                            @csrf
                                                        </form>       
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
@endsection
