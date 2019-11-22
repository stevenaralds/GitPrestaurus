{{-- listar usuarios --}}

@extends('layouts.master')

@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            {{-- <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li> --}}
            <a href="#">{{ $role->name }}</a>
            <a href="#">MUSIC</a>
            <a href="#">CONTACT</a>
        </div>
    </div>

@endsection

@section('Contenido')






@endsection

@section('Contenido2')

    <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                    <h3 class="box-title">Role</h3>

              </div>
              <!-- /.box-header -->

                @include('Admin.usuarios.roles.partials.info')
                @include('Admin.usuarios.roles.partials.error')


                <div class="box-body">
                   <p><strong>Nombre:  </strong> {{ $role->name }}</p>
                    <p><strong>Slug: </strong> {{ $role->slug }}</p>
                    <p><strong>Descripcion: </strong> {{ $role->description }}</p>
                </div>

                <div class="box-footer">

                    <a class="btn btn-primary" href="{{ route('roles.index') }}" role="button">Regresar</a>
                </div>
            </div>
            <!-- /.box -->

        </div>

    </section>
@endsection


@section('Contenido2')



   <!-- Main content -->
   <section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">

            <h3> <strong> {{ $role->name }}</strong> </h3 >
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        @include('Admin.usuarios.roles.partials.error')
        <div class="box-body">

            <p><strong>ID:</strong> {{ $role->id }}</p>

             <p><strong>Nombre: </strong> {{ $role->nombre }}</p>
             <p><strong>Descripción:</strong> {{ $role->descripcion }}</p>


        </div>
      <!-- /.box-body -->
        <div class="box-footer">

            <a class="btn btn-primary" href="{{ route('roles.index') }}" role="button">Regresar</a>
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
                        alert('El role no fue eliminado');
                        $('#alert').html(" El role no fue eliminado algo salió mal");
                        row.show();
                    });
                }
            });
        });


    </script>
@endsection



