
    <div class="form-group">
        {{ Form::label('cliente', 'Cliente') }}
        {{ Form::select('cliente_id', $objcliente, null, ['class' => 'form-control select2', 'placeholder'=>'Selecciona el cliente...']) }}

    </div>



    {{-- <div class="form-group">
        {{ Form::hidden('cliente_id', isset($objcliente)?$objcliente->id:null, ['class' => 'form-control', 'id' => 'cliente_id']) }}
    </div>
    <div class="form-group">
        {{ Form::label('cedula', 'Cédula') }}
        {{ Form::text('cedula', isset($objcliente)?$objcliente->cedula:null, ['class' => 'form-control', 'id' => 'cedula', 'readonly' => 'true']) }}
        </div>
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre del cliente') }}
        {{ Form::text('nombre', isset($objcliente)?$objcliente->nombre:null,  ['class' => 'form-control', 'id' => 'nombre', 'readonly' => 'true']) }}
    </div> --}}

    <div class="form-group">
        {{ Form::label('name', 'Valor a prestar') }}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
            {{ Form::text('monto', null, ['class' => 'form-control', 'id' => 'monto']) }}
        </div>

    </div>

<div class="row">
    <div class="col-lg-6 col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
            {{ Form::label('interes1', 'Interes') }}

            <div class="input-group">
                {{ Form::text('interes', null, ['class' => 'form-control', 'id' => 'interes']) }}
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('totalapagar', 'Total a pagar') }}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                {{ Form::text('totalapagar', null, ['class' => 'form-control', 'id' => 'totalapagar']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Forma de pago') }}
            {{ Form::select('formapago', array('Diario' => 'Diario', 'Semanal' => 'Semanal', 'Quincenal' => 'Quincenal', 'Mensual' => 'Mensual'), null, ['class' => 'form-control']) }}
        </div>



    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

        <div class="form-group">
            {{ Form::label('nrocuotas', 'Cuotas') }}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                {{ Form::text('nrocuotas', null, ['class' => 'form-control', 'id' => 'nrocuotas']) }}
            </div>

        </div>
        <div class="form-group">
            {{ Form::label('vlrcuota', 'Valor de la cuota') }}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                {{ Form::text('vlrcuota', isset($cuota)?$cuota:null, ['class' => 'form-control', 'id' => 'vlrcuota']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('diaspago', 'Dias de Pago') }}
            <br>
            
            <!-- nombre campo y despues valor -->
            {{ Form::select('dias', array( 'Todos' => 'Todos','Monday' => 'Lunes', 'Tuesday' => 'Martes', 'Wednesday' => 'Miercoles', 'Thursday' => 'Jueves', 'Friday' => 'Viernes', 'Saturday' => 'Sabado'), null, ['class' => 'form-control']) }}
        </div>

    </div>
</div>

<div class="form-group">
    <div class="box-footer ">
        <div class="col-xs-6 ">
               {{-- <a class="btn btn-primary" href="{{ route('prestamos.index') }}" role="button">Regresar</a> --}}

               <a class="btn btn-primary" href="javascript:history.back(-1);" title="Ir la página anterior">Regresar</a>
        </div>


        <div class="col-xs-6">

                {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

         </div>
    </div>
</div>

{{-- {!! Form::close() !!} --}}

@section('scripts')

    <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
    <script>
        $(document).ready(function () {

            $("#monto").keyup(function () {
                var monto = document.getElementById('monto').value;
                var interes = document.getElementById('interes').value;
                var nrocuotas = document.getElementById('nrocuotas').value;
                var totalapagar = ((parseInt(monto) * (parseInt(interes)/100)) + parseInt(monto));
                var result = totalapagar  / parseInt(nrocuotas);
                if (!isNaN(result)) {
                    document.getElementById('vlrcuota').value = result;
                    document.getElementById('totalapagar').value = totalapagar;
                };
            });

            $("#interes").keyup(function () {
                var monto = document.getElementById('monto').value;
                var interes = document.getElementById('interes').value;
                var nrocuotas = document.getElementById('nrocuotas').value;
                var totalapagar = ((parseInt(monto) * (parseInt(interes)/100)) + parseInt(monto));
                var result = totalapagar  / parseInt(nrocuotas);
                if (!isNaN(result)) {
                    document.getElementById('vlrcuota').value = result;
                    document.getElementById('totalapagar').value = totalapagar;
                };
            });

            $("#nrocuotas").keyup(function () {
                var monto = document.getElementById('monto').value;
                var interes = document.getElementById('interes').value;
                var nrocuotas = document.getElementById('nrocuotas').value;
                var totalapagar = ((parseInt(monto) * (parseInt(interes)/100)) + parseInt(monto));
                var result = totalapagar  / parseInt(nrocuotas);
                if (!isNaN(result)) {
                    document.getElementById('vlrcuota').value = result;
                    document.getElementById('totalapagar').value = totalapagar;
                };
            });
        });
  </script>


@endsection


