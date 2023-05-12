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
                                <form class="mt-2" action="{{route('search')}}" method="get">
                                    @csrf
                                    <input type="search" class="form-control-sm" placeholder="Buscar" name="texto" style="font-size: small">            
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
                                        <th></th>
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
                                            <td>
                                                <input class="form-check-input mt-0" type="checkbox" value="{{ $pieza->id }}" name="piezas[]" data-id="{{ $pieza->id }}">
                                            </td>
                                            <td name="id">{{ $pieza->id }}</td>
        								    <td name="codigo">{{ $pieza->codigo }}</td>
											<td name="descripcion">{{ $pieza->descripcion }}</td>
											<td name="entradas">{{ $pieza->entradas }}</td>
											<td name="salidas">{{ $pieza->salidas }}</td>
											<td name="stock">{{ $pieza->stock }}</td>
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
                            <div style="text-align:right">
                                <button name="imprimir" class="btn btn-primary btn-sm" style="font-size:small; text-align:right">
                                    <i class="fa fa-fw fa-print"></i> Imprimir seleccionados
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $piezas->links('pagination.pagination') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let selectedItems = [];

        document.querySelectorAll('input[type=checkbox][name=piezas\\[\\]]').forEach(function (el) {
            el.addEventListener('change', function (e) {
                let id = e.target.dataset.id;

                if (e.target.checked) {
                    selectedItems.push(id);
                } else {
                    selectedItems = selectedItems.filter(function (item) {
                        return item !== id;
                    });
                }
            });
        });

        document.querySelector('button[name=imprimir]').addEventListener('click', function (e) {
        e.preventDefault();

        let form = document.getElementById('imprimir-form');

        selectedItems.forEach(function (id) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'piezas[]';
            input.value = id;
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });
    </script>
@endsection

@section('form_scripts')
    <form id="imprimir-form" method="post" action="{{ route('cart.store') }}">
        @csrf
        <input type="hidden" name="registros_seleccionados" id="registros_seleccionados">
    </form>
@endsection
