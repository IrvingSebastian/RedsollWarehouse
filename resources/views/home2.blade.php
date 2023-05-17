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
                Administradores
                @foreach ($admins as $admin)
                        <div class="card">
                            <div class="card-header">
                                {{$admin->users->name}}
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
                                            <td>{{$admin->piezas->id}}</td>
                                            <td>{{$admin->piezas->codigo}}</td>
                                            <td>{{$admin->piezas->descripcion}}</td>
                                            <td>{{$admin->piezas->entradas}}</td>
                                            <td>{{$admin->piezas->salidas}}</td>
                                            <td>{{$admin->piezas->stock}}</td>
                                            <td>
                                                <form action="{{ route('piezas.destroy', $admin->piezas->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$admin->piezas->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$admin->piezas->id) }}">
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
                @endforeach

                Instaladores
                @foreach ($instalers as $instaler)
                    <div class="card">
                        <div class="card-header">
                            {{$instaler->users->name}}
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
                                        <td>{{$instaler->piezas->id}}</td>
                                        <td>{{$instaler->piezas->codigo}}</td>
                                        <td>{{$instaler->piezas->descripcion}}</td>
                                        <td>{{$instaler->piezas->entradas}}</td>
                                        <td>{{$instaler->piezas->salidas}}</td>
                                        <td>{{$instaler->piezas->stock}}</td>
                                        <td>
                                            <form action="{{ route('piezas.destroy', $instaler->piezas->id) }}" method="POST">
                                                <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$instaler->piezas->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$instaler->piezas->id) }}">
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
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection
