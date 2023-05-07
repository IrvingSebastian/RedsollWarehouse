<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_productos') }}
            {{ Form::text('id_productos', $pieza->id_productos, ['class' => 'form-control' . ($errors->has('id_productos') ? ' is-invalid' : ''), 'placeholder' => 'Id Productos']) }}
            {!! $errors->first('id_productos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $pieza->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $pieza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entradas') }}
            {{ Form::text('entradas', $pieza->entradas, ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), 'placeholder' => 'Entradas']) }}
            {!! $errors->first('entradas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salidas') }}
            {{ Form::text('salidas', $pieza->salidas, ['class' => 'form-control' . ($errors->has('salidas') ? ' is-invalid' : ''), 'placeholder' => 'Salidas']) }}
            {!! $errors->first('salidas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $pieza->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>