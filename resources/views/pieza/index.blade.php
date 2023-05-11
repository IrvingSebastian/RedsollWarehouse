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
                                <a href="{{ route('piezas.create') }}" class="btn btn-primary btn-sm" style="font-size: small">
                                    <i class="fa fa-fw fa-plus"></i> Crear nueva pieza
                                </a>
                                <a href="{{route('imprimir')}}" class="btn btn-primary btn-sm" style="font-size: small">
                                    <i class="fa fa-fw fa-print"></i> Imprimir 
                                </a>
                                <form class="mt-2" action="{{route('search')}}" method="get">
                                    @csrf
                                    <input type="search" class="form-control-sm" placeholder="Buscar" name="texto">            
                                    <button type="submit" class="btn btn-success btn-sm" style="font-size: small">
                                        <i class="fa fa-fw fa-search"></i> Buscar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($piezas as $pieza)
                                        <tr>
                                            <td>{{ $pieza->id }}</td>
        								    <td>{{ $pieza->codigo }}</td>
											<td>{{ $pieza->descripcion }}</td>
											<td>{{ $pieza->entradas }}</td>
											<td>{{ $pieza->salidas }}</td>
											<td>{{ $pieza->stock }}</td>
                                            <td>
                                                <form action="{{ route('piezas.destroy',$pieza->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$pieza->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: small"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $piezas->links('pagination.pagination') }}
            </div>
        </div>
    </div>
@endsection
