@extends('layouts.app2')

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
                                {{ __('Pieza') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('piezas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID Productos</th>
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
                                            <td>{{ ++$i }}</td>
        								    <td>{{ $pieza->codigo }}</td>
											<td>{{ $pieza->descripcion }}</td>
											<td>{{ $pieza->entradas }}</td>
											<td>{{ $pieza->salidas }}</td>
											<td>{{ $pieza->stock }}</td>

                                            <td>
                                                <form action="{{ route('piezas.destroy',$pieza->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('piezas.show',$pieza->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('piezas.edit',$pieza->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
