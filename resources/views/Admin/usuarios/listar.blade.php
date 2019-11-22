{{-- listar usuarios --}}

@extends('layouts.master')


@section('Contenido')
    <!-- RECUADRO SUPERIOR -->
    <div class="breadcumb-area ">

        <div class="text">
            <h1> Listado De Usuarios </h1>
        </div>
        <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="#">Usuarios</a></li>
            </ol>

      </section>
    </div>
    <!-- RECUADRO SUPERIOR -->


@endsection

@section('Contenido2')
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

            <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="box-title">Listar Usuarios</h3>
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
                            <a href="{{ route('register') }}" class="pull-right btn btn-sm btn-info glyphicon glyphicon-plus-sign">
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
                    <th >ID</th>
                    <th>Imagen</th>
                    <th >Nombre</th>
                    <th>Email</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)

                    <tr>
                        <td  width="10px">{{ $user->id }}</td>
                        <td>{{ $user->archivoimg }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td >{{ $user->email }}</td>

                        {{-- <td>{{ $usuario->role->nombre }}</td> --}}
                      <td width="10px">
                          <a href="{{ route('users.show', $user->id) }}" title="Ver" class="btn btn-primary glyphicon glyphicon-search"></a>

                      </td>
                      <td width="10px">
                          <a href="{{ route('users.edit', $user->id) }}" title="Editar" class="btn btn-warning glyphicon glyphicon-edit"></a>
                      </td>


                      <td width="10px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'id' => 'form-borrar']) !!}
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
                {{ $users->render() }}
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
                if(confirm('¿Está seguro que desea borrar el usuario?')){
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
                        $('#alert').html(" El usuario no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



