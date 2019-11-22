{{-- mostrar permisos --}}

@extends('layouts.master')


@section('Contenido')

 <!-- RECUADRO SUPERIOR -->
 <div class="breadcumb-area flex-style ">

    <div class="text">
        <h1> {{ $permission->name }} </h1>
    </div>
    <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li><a href="{{ route('permissions.index') }}">Usuarios</a></li>
          <li><a href="#">{{ $permission->name }}</a></li>
        </ol>

  </section>
</div>
<!-- RECUADRO SUPERIOR -->


@endsection


@section('Contenido2')


   <!-- Main content -->
   <section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">


            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <p><strong>ID</strong> {{ $permission->id }}</p>

             <p><strong>Nombre: </strong> {{ $permission->name }}</p>
             <p><strong>Slug</strong> {{ $permission->slug }}</p>
             <p><strong>Descripción</strong> {{ $permission->description }}</p>

        </div>
      <!-- /.box-body -->
        <div class="box-footer">

            <a class="btn btn-primary" href="{{ route('permissions.index') }}" role="button">Regresar</a>
        </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    </section>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {

            $('#alert').hide();

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                if(confirm('¿Está seguro que desea borrar el usuario?')){
                    var row = $(this).parents('tr');
                    var id = row.data('id');
                    var form = $('#form-borrar');
                    var url = form.attr('action');
                    var data = form.serialize();

                    $('#alert').show();

                    $.post(url, data, function (result) {
                        row.fadeOut();
                        alert(result.mensaje);
                        $('#alert').html(result.mensaje);


                    }).fail(function () {
                        alert('El usuario no fue eliminado');
                        $('#alert').html(" El usuario no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



