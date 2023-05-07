@extends('layouts.app2')

@section('template_title')
    {{ __('Create') }} Pieza
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Nueva') }} Pieza</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('piezas.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('pieza.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
