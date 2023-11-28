@extends('layouts.app')

@section('template_title')
    Pieza
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->rol != "Jefe de Almacen")
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" style="font-size:x-large">
                                Pieza
                            </span>
                            <div class="float-right">
                                @if (Auth::user()->rol == "Administrador")
                                    <a href="{{ route('piezas.create') }}" class="btn btn-primary btn-sm" style="font-size: small">
                                        <i class="fa fa-fw fa-plus"></i> Crear nueva pieza
                                    </a>
                                    <form action="{{ route('procesar.xml') }}" method="POST" enctype="multipart/form-data" style="font-size: small" class="form-control-sm" id="formXML"> 
                                        @csrf
                                        <input type="file" name="xmlFile" style="font-size: small" class="form-control mt-1" form="formXML" >
                                        <button type="submit" class="btn btn-success btn-sm mt-1" for="xmlFile" style="font-size: small" form="formXML">
                                            <i class="fa fa-fw fa-upload"></i> Agregar Archivo XML
                                        </button>
                                    </form>
                                @endif              
                                <form action="{{route('piezas.search')}}" method="GET" id="formSearch">
                                    @csrf
                                    <input type="search" class="form-control-sm mt-1" placeholder="Buscar" name="texto" style="font-size: small" form="formSearch" 
                                        @if(isset($texto))
                                            value="{{$texto}}"
                                        @endif
                                    >            
                                    <button type="submit" class="btn btn-success btn-sm" style="font-size: small" form="formSearch">
                                        <i class="fa fa-fw fa-search"></i> Buscar
                                    </button>
                                </form>
                                @if (Request::is('search'))
                                    <a href="{{route('piezas.index')}}" class="btn btn-primary btn-sm mt-2" style="font-size: small">
                                        <i class="fa fa-fw fa-arrow-left"></i> Volver
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-1">
                                    <form action="{{route('selector')}}" method="GET" id="formSelect">
                                    <table class="table table-striped table-hover" style="font-size: small">
                                        <thead class="thead">
                                            <tr>
                                                <th>Cantidad Salida</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($piezas as $pieza)
                                        <tr style="height: 150px">
                                            <td>
                                                <input min="0" max="{{$pieza->stock}}" style="font-size: small; width:75px" name="piezas[{{ $pieza->id }}]" type="number" value="0" form="formSelect" 
                                                @if ($pieza->stock <= 0)
                                                    disabled
                                                @endif
                                                />
                                                <label class="form-label mt-1" style="font-size: small" for="typeNumber">Stock: <br> {{$pieza->stock}}</label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div style="text-align: left">
                                        <button type="submit" class="btn btn-primary btn-sm" style="font-size: small" form="formSelect">
                                            <i class="fa fa-fw fa-plus"></i> Agregar Selección
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                <div class="table-responsive col-md-11">
                                    <table class="table table-striped table-hover" style="font-size: small">
                                        <thead class="thead">
                                            <tr>
                                                <th>ID</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Entradas</th>
                                                <th>Salidas</th>
                                                <th>Stock</th>
                                                @if (Auth::user()->rol == "Administrador")
                                                    <th>Devolucion</th>
                                                    <th>Piezas Mínimas</th>
                                                @endif
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($piezas as $pieza)
                                                <tr style="height: 150px">                                                                                                                     
                                                    <td>{{ $pieza->id }}</td>
                                                    <td>{{ $pieza->codigo }}</td>
                                                    <td>{{ $pieza->descripcion }}</td>
                                                    <td>{{ $pieza->entradas }}</td>
                                                    <td>{{ $pieza->salidas }}</td>
                                                    <td>{{ $pieza->stock }}</td>
                                                    @if (Auth::user()->rol == "Administrador")
                                                        <td>{{ $pieza->devolucion }}</td>
                                                        <td>{{ $pieza->piezas_minimas }}</td>
                                                    @endif
                                                    <td>
                                                        @if (Auth::user()->rol == "Administrador")
                                                        <form action="{{ route('piezas.destroy', $pieza->id) }}" method="POST" id="formDestroy">   
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                            <a class="btn btn-success btn-sm" style="font-size: small" href="{{ route('piezas.edit',$pieza->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> Editar</a>
                                                            <a class="btn btn-info btn-sm mt-1" style="font-size: small" href="{{ route('piezas.devolucion',$pieza->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> Devolver</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm mt-2" style="font-size: small" form="formDestroy">
                                                                <i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
                                                        </form>
                                                            
                                                        @elseif (Auth::user()->rol == "Instalador")
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>  
                                                            
                                                            <br>    
                                                            <div class="form-outline mt-2" style="font-size: small">
                                                                <input min="1" max="{{$pieza->stock}}" type="number" id="typeNumber-{{ $pieza->id }}" class="form-control" disabled
                                                                @if ($pieza->stock <= 0)
                                                                    disabled
                                                                @endif
                                                                />
                                                                <label class="form-label" for="typeNumber">En stock {{$pieza->stock}}</label>
                                                            </div>
                                                        @elseif (Auth::user()->rol == "Jefe de Almacen")
                                                            <a class="btn btn-primary btn-sm" style="font-size: small" href="{{ route('piezas.show',$pieza->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (Auth::user()->rol != "Jefe de Almacen")
                                        <div style="text-align:left">
                                            <a href="{{ route('selector.borrar') }}" class="btn btn-danger btn-sm" style="font-size:small">
                                                <i class="fa fa-fw fa-trash-o"></i> Borrar todo lo seleccionado
                                            </a>
                                            <a href="{{ route('selector.visualizar') }}" class="btn btn-info btn-sm" style="font-size:small">
                                                <i class="fa fa-fw fa-eye"></i> Ver selección
                                            </a>
                                        </div>
                                    @endif  
                                </div>                         
                            </div>
                        </div>
                    </div>
                </div>
                {{ $piezas->links('pagination.pagination') }}
            </div>
        </div>
    </div>
@endsection
