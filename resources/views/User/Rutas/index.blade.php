{{-- listar ruta x usuario --}}

@extends('layouts.master')



@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="#">Ruta</a>

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
                            <h3 class="box-title">Listar rutas</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
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
                      <th>ID</th>
                    <th >Cedula</th>
                    <th>Nombre</th>
                    <th >Valor Prestado</th>
                    <th>Saldo</th>
                    <th>Debito</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($objruta as $ruta)

                    <tr>
                        {{-- variable->funcion de la relacion -> campo --}}
                        <td >{{ $ruta->id }}</td>
                        <td  width="10px">{{ $ruta->cliente->cedula }}</td>
                        <td>{{ $ruta->cliente->nombre }}</td>
                        <td >{{ $ruta->monto }}</td>
                        <td >{{ $ruta->saldo }}</td>
                        <td >{{ $ruta->vlrabono }}</td>

                        {{-- <td>{{ $usuario->role->nombre }}</td> --}}
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $objruta->render() }}
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
                if(confirm('¿Está seguro que desea borrar el ruta?')){
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
                        $('#alert').html(" El ruta no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



