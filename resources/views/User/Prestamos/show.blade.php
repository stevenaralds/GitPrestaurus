{{-- mirar en detalle --}}

@extends('Layouts.Master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection



@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="{{ route('clientes.index') }}">Prestamos</a>
            <a href="#">{{ $objprestamo->cedula }} </a>

        </div>
    </div>

@endsection

@section('Contenido2')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                   <div class="box-header with-border">
                        <h3 class="box-title">Prestamo</h3>
                        <div class="">
                                <div class="">
                                    <a href="{{ route('abonos.create', ['prestamoid'=>$objprestamo->id,'vlrcuota'=>$objprestamo->vlrcuota]) }}" class="pull-right btn  btn-info glyphicon glyphicon-plus-sign">
                                         Nuevo Abono
                                    </a>
                                </div>
                            </div>

                  </div>
                  
                  <!-- /.box-header -->

                  @include('User.partials.info')
                  @include('User.partials.error')


                    <div class="box-body">
                        <p><strong>Fecha:</strong> {{ $objprestamo->created_at }}</p>
                        <p><strong>Cédula:</strong> {{ $objprestamo->cliente->cedula }}</p>
                        <p><strong>Nombre:</strong> {{ $objprestamo->cliente->nombre }}</p>
                        <p><strong>Valor prestado:</strong> {{ $objprestamo->monto }}</p>
                        <p><strong>Forma de pago:</strong> {{ $objprestamo->formapago }}</p>
                        <p><strong>Numero de Cuotas:</strong> {{ $objprestamo->nrocuotas }}</p>
                        <p><strong>Interes:</strong> {{ $objprestamo->interes }}</p>
                        <p><strong>Valor Cuota:</strong> {{ $objprestamo->vlrcuota }}</p>
                        <p><strong>Saldo:</strong> {{ $objprestamo->saldo }}</p>
                        <p><strong>Cuotas Pagadas:</strong> {{ $objprestamo->vlrabono }}</p>
                        <p><strong>Cuotas Pendiente:</strong> {{ $objprestamo->vlrabono }}</p>
                       
                    </div>

                    <div class="box-footer">

                        {{-- <a class="btn btn-primary" href="{{ route('prestamos.index') }}" role="button">Regresar</a> --}}
                        <a class="btn btn-primary" href="javascript:history.back(-1);" title="Ir la página anterior">Regresar</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>

            <!-- Cuadro abono -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 >Abonos</h1>
                    </div>
                  <!-- /.box-header -->

                    <div class="box-body">
                        <div class="table-responsive">

                            @include('Admin.usuarios.partials.info')
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Numero de Cuotas</th>
                                        <th>Valor Prestado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($objabono as $abono)

                                      <tr>
                                          {{-- variable->funcion de la relacion -> campo --}}
                                         
                                          <td>{{ $abono->created_at->format('d/m/Y')  }}</td>
                                          <td>{{ $abono->nrocuotas }}</td>
                                           {{-- <td>{{ $abono->Prestamo->saldo }}</td> --}}
                                          
                                          <td >{{ $abono->valor }}</td>

                                         
                                           
                                        <td width="10px">
                                            <a href="{{ route('prestamos.show', $abono->id) }}" title="Ver" class="btn btn-primary glyphicon glyphicon-eye-open"></a>

                                        </td>

                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box-footer">

                        <a class="btn btn-primary" href="javascript:history.back(-1);" title="Ir la página anterior">Regresar</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
@endsection
