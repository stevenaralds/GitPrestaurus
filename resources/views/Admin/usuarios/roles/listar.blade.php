{{-- listar roles --}}

@extends('layouts.master')



@section('breadcrumb')
    <div class="text">
        <h1> Listado De Roles </h1>
    </div>
    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="#">Roles</a>
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
                        <h3 class="box-title">Listar Roles</h3>
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
                        <a href="{{ route('roles.create') }}" class="pull-right btn btn-sm btn-info glyphicon glyphicon-plus-sign">
                            Crear
                        </a>
                    </div>
                </div>

            </div>

            <!-- /.box-header -->
            <div class="table-responsive">
                {{-- mensaje de alerta --}}
                <div id="alert" class="alert alert-info ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>


                </div>
                @include('Admin.usuarios.roles.partials.info')
                @include('Admin.usuarios.roles.partials.error')



              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th >ID</th>
                    <th >Nombre</th>
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th>Special</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $role)

                    <tr>
                        <td width="10px">{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td >{{ $role->display_name }}</td>
                        <td >{{ $role->description }}</td>
                        <td >{{ $role->special }}</td>

                      <td width="10px">
                          <a href="{{ route('roles.show', $role->id) }}" title="Ver" class="btn btn-primary glyphicon glyphicon-search"></a>

                      </td>
                      <td width="10px">
                          <a href="{{ route('roles.edit', $role->id) }}" title="Editar" class="btn btn-warning glyphicon glyphicon-edit"></a>
                      </td>
                      <td width="10px">
                        {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE', 'id' => 'form-borrar']) !!}
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
                {{ $roles ->render() }}
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
                if(confirm('¿Está seguro que desea borrar el role?')){
                    var row     = $(this).parents('tr');
                    var form    = $(this).parents('form');
                    var url     = form.attr('action');

                    $('#alert').show();

                    // por el metodo pos se envia la url, el formulario y la funcion con los parametros
                    $.post(url, form.serialize(), function(result){
                        // El efecto fadeOut() oculta un elemento variando su opacidad
                         row.fadeOut();
                        alert(result.mensaje); // cuadro de mensaje msgbox

                       // $('#alert').html(result.mensaje);// se muestra en el form



                    }).fail(function () {
                       // alert('El role no fue eliminado');
                        $('#alert').html(" El role no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



