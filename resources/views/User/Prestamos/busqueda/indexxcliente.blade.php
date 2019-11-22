{{-- listar Prestamo x usuario --}}

@extends('layouts.master')



@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="#">Prestamos</a>
            <a href="#"> {{ $objcliente->nombre }}</a>
        </div>
    </div>

@endsection

@section('Contenido2')
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

            <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="box-title">Listar Prestamos</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('prestamos.create') }}" class="pull-right btn btn-sm btn-info glyphicon glyphicon-plus-sign">
                                Crear
                            </a>
                        </div>
                    </div>

                </div>


            <!-- /.box-header -->
            <div class="table-responsive">

                <div id="alert" class="alert alert-info ">

                  </div>
                  @include('Admin.usuarios.partials.info')
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th >Cedula</th>
                    <th>Nombre</th>
                    <th >Valor Prestado</th>
                    <th>Saldo</th>
                    <th>Debito</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($objprestamo as $prestamo)

                    <tr>
                        {{-- variable->funcion de la relacion -> campo --}}
                        <td  width="10px">{{ $prestamo->cliente->cedula }}</td>
                        <td>{{ $prestamo->cliente->nombre }}</td>
                        <td >{{ $prestamo->monto }}</td>
                        <td >{{ $prestamo->saldo }}</td>
                        <td >{{ $prestamo->vlrabono }}</td>

                        {{-- <td>{{ $usuario->role->nombre }}</td> --}}
                      <td width="10px">
                          <a href="{{ route('prestamos.show', $prestamo->id) }}" title="Ver" class="btn btn-primary glyphicon glyphicon-search"></a>

                      </td>
                      <td width="10px">
                          <a href="{{ route('prestamos.edit', $prestamo->id) }}" title="Editar" class="btn btn-warning glyphicon glyphicon-edit"></a>
                      </td>


                      <td width="10px">
                        {!! Form::open(['route' => ['prestamos.destroy', $prestamo->id], 'method' => 'DELETE', 'id' => 'form-borrar']) !!}
                            <button type="button" title="Eliminar" class="btn  btn-danger btn-delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        {!! Form::close() !!}

                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $objprestamo->render() }}
              </ul>

            </div>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
    </section>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {

            $('#alert').hide();

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                if(confirm('¿Está seguro que desea borrar el Prestamo?')){
                    var row     = $(this).parents('tr');
                    var form    = $(this).parents('form');
                    var url     = form.attr('action');
                    $('#alert').show();

                    // por el metodo pos se envia la url, el formulario y la funcion con los parametros
                    $.post(url, form.serialize(), function(result){
                        row.fadeOut();
                        // alert(result.mensaje);// cuadro de mensaje msgbox
                        $('#alert').html(result.mensaje);// se muestra en el form


                    }).fail(function () {
                        //alert('El usuario no fue eliminado');
                        $('#alert').html(" El prestamo no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



