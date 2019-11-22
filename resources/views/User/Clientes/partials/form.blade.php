

<div class="form-group">
    {{ Form::label('name', 'Cédula') }}
    {{ Form::text('cedula', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
<div class="form-group">
    {{ Form::label('tel', 'Telefono') }}
    {{ Form::text('tel', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('cel', 'Celular') }}
    {{ Form::text('cel', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('dir', 'Dirección') }}
    {{ Form::text('dir', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    <div class="box-footer">
        <div class="col-xs-6">
               <a class="btn btn-primary" href="{{ route('clientes.index') }}" role="button">Regresar</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <div class="form-group">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
            </div>
         </div>
    </div>
</div>
