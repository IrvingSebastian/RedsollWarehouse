@extends('layouts.app')

@section('template_title')
    Pieza
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pieza') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pieza.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Id Productos</th>
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
                                            
											<td>{{ $pieza->id_productos }}</td>
											<td>{{ $pieza->codigo }}</td>
											<td>{{ $pieza->descripcion }}</td>
											<td>{{ $pieza->entradas }}</td>
											<td>{{ $pieza->salidas }}</td>
											<td>{{ $pieza->stock }}</td>

                                            <td>
                                                <form action="{{ route('pieza.destroy',$pieza->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pieza.show',$pieza->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pieza.edit',$pieza->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
        
            </div>
        </div>
    </div>
@endsection
