<div class="box box-info padding-1">
    <div class="box-body">
        @if (Request::is('devolucion/*'))
        <div class="form-group">
            {{ Form::label('devolucion') }}
            {{ Form::text('devolucion', $pieza->devolucion, ['class' => 'form-control' . ($errors->has('devolucion') ? ' is-invalid' : ''), 'placeholder' => 'Devolucion', 'required']) }}
            {!! $errors->first('devolucion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @else 
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
            @if(Request::is('piezas/create'))
                {{ Form::label('entradas') }}
                {{ Form::number('entradas', $pieza->entradas, ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), 'placeholder' => 'Entradas', 'required']) }}
                {!! $errors->first('entradas', '<div class="invalid-feedback">:message</div>') !!}
            @else
                {{ Form::label('entradas: ingrese un valor y será sumado al anterior, escriba 0 si no desea modificar nada') }}
                {{ Form::number('entradas', '', ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), 'placeholder' => $pieza->entradas, 'required']) }}
                {!! $errors->first('entradas', '<div class="invalid-feedback">:message</div>') !!}
            @endif       
        </div>       
        @endif      
    <br>
    <div class="box-footer mt20">
        @if(Request::is('piezas/create'))
            <button type="submit" class="btn btn-success btn-sm" style="font-size: small">
                <i class="fa fa-fw fa-upload"></i>Subir datos</button>
            <button type="reset" class="btn btn-warning btn-sm" style="font-size: small">
                <i class="fa fa-fw fa-refresh"></i></i>Reiniciar</button>
        @elseif(Request::is('piezas/*/edit') || Request::is('devolucion/*'))
            <button type="submit" class="btn btn-success btn-sm" style="font-size: small">
                <i class="fa fa-fw fa-edit"></i>Actualizar</button>
        @endif

        <a class="btn btn-primary btn-sm" href="{{ route('piezas.index') }}" style="font-size: small">
            <i class="fa fa-fw fa-arrow-circle-left"></i> Volver </a>
    </div>
</div>