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
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="#">{{ $objcliente->cedula }} </a>

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
                    <h1 >Cliente</h1>
              </div>
              <!-- /.box-header -->

              @include('User.partials.info')
              @include('User.partials.error')


                <div class="box-body">
                    <p><strong>Cédula:</strong> {{ $objcliente->cedula }}</p>
                    <p><strong>Nombre:</strong> {{ $objcliente->nombre }}</p>
                    <p><strong>Teléfono:</strong> {{ $objcliente->tel }}</p>
                    <p><strong>Celular:</strong> {{ $objcliente->cel }}</p>
                    <p><strong>Dirección:</strong> {{ $objcliente->dir }}</p>
                    <p><strong>E-Mail:</strong> {{ $objcliente->email }}</p>
                </div>

                <div class="box-footer">

                    <a class="btn btn-primary" href="{{ route('clientes.index') }}" role="button">Regresar</a>
                </div>
            </div>
            <!-- /.box -->

        </div>

    </section>

    {{-- seccion prestamos --}}
    <section class="content">
        <div class="row">
             <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 >Prestamos</h1>
                    </div>
                  <!-- /.box-header -->

                    <div class="box-body">
                        <div class="table-responsive">

                            @include('Admin.usuarios.partials.info')
                            <table class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th >Valor Prestado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($objprestamo as $prestamo)

                                      <tr>
                                          {{-- variable->funcion de la relacion -> campo --}}
                                          <td class="label bg-green d-flex justify-content-center"  width="10px">{{ $prestamo->estado }}</td>
                                          <td >{{ $prestamo->monto }}</td>


                                          {{-- <td>{{ $usuario->role->nombre }}</td> --}}
                                        <td width="10px">
                                            <a href="{{ route('prestamos.show', $prestamo->id) }}" title="Ver" class="btn btn-primary glyphicon glyphicon glyphicon-eye-open"></a>

                                        </td>

                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box-footer">

                        <a class="btn btn-primary" href="{{ route('clientes.index') }}" role="button">Regresar</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>




@endsection
