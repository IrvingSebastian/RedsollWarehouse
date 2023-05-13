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

                        </div>
                    </div>
                    
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
                                            <td>{{ $pieza->id }}</td>
        								    <td>{{ $pieza->codigo }}</td>
											<td>{{ $pieza->descripcion }}</td>
											<td>{{ $pieza->entradas }}</td>
											<td>{{ $pieza->salidas }}</td>
											<td>{{ $pieza->stock }}</td>
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
    <form id="imprimir-form" method="GET" action="{{ route('imprimir') }}">
        @csrf
        <input type="hidden" name="registros_seleccionados" id="registros_seleccionados">
    </form>
@endsection
