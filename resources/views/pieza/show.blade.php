@extends('layouts.app2')

@section('template_title')
    {{ __('Show') }} Pieza 
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pieza</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('piezas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $pieza->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $pieza->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Entradas:</strong>
                            {{ $pieza->entradas }}
                        </div>
                        <div class="form-group">
                            <strong>Salidas:</strong>
                            {{ $pieza->salidas }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $pieza->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
