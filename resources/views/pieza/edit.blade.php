@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Pieza
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Pieza {{$pieza->id}}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('piezas.update', $pieza->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('pieza.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
