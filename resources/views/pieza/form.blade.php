<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $pieza->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo', 'required']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $pieza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'required']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entradas') }}
            {{ Form::text('entradas', $pieza->entradas, ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), 'placeholder' => 'Entradas', 'required']) }}
            {!! $errors->first('entradas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salidas') }}
            {{ Form::text('salidas', $pieza->salidas, ['class' => 'form-control' . ($errors->has('salidas') ? ' is-invalid' : ''), 'placeholder' => 'Salidas', 'required']) }}
            {!! $errors->first('salidas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $pieza->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock', 'required']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        @if(Request::is('piezas/create'))
            <button type="submit" class="btn btn-success"><i class="fa fa-fw  fa-upload"></i>{{ __('Subir datos') }}</button>
            <button type="reset" class="btn btn-warning"><i class="fa fa-fw fa-refresh"></i></i>{{ __('Reiniciar') }}</button>
        @endif
        @if(Request::is('piezas/*/edit'))
            <button type="submit" class="btn btn-success" ><i class="fa fa-fw fa-edit"></i> {{ __('Actualizar') }}</button>
        @endif
        <a class="btn btn-primary" href="{{ route('piezas.index') }}"><i class="fa fa-fw fa-arrow-circle-left"></i> Volver </a>
    </div>
</div>