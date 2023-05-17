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
