<div class="form-group">
    {{ Form::label('prestamo_id', 'prestamo_id') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
        {{ Form::text('prestamo_id', $prestamo_id, ['class' => 'form-control', 'id' => 'nrocuotas']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('nrocuotas', 'Numero de Cuotas a Pagar') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
        {{ Form::text('nrocuotas', null, ['class' => 'form-control', 'id' => 'nrocuotas']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('valor', 'Valor') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        {{ Form::text('vlrcuota', $vlrcuota, ['class' => 'form-control', 'id' => 'valor']) }}
    </div>
</div>
<div class="form-group">
    <div class="box-footer">
        <div class="col-xs-6">
            <a class="btn btn-primary" href="javascript:history.back(-1);" title="Ir la página anterior">Regresar</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <div class="form-group">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
            </div>
         </div>
    </div>
</div>

@section('scripts')

  


@endsection
