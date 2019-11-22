{{-- editar --}}

@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('Contenido')
    <!-- RECUADRO SUPERIOR -->

    <!-- RECUADRO SUPERIOR -->
    <div class="breadcumb-area flex-style ">

        <div class="text">
            <h1> Editar permissions </h1>
        </div>
        <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('permissions.index') }}">permissions</a></li>
              <li><a href="#">{{$permission->name}}</a></li>
            </ol>

      </section>
    </div>

@endsection


@section('Contenido2')
    <section class="content">
        <div class="row">
            {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT']) !!}
                <!-- left column -->
                <div class="col-md-12 col-lg-6 col-sm-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar permisos</h3>
                        </div>
                        <!-- /.box-header -->

                        @include('Admin.usuarios.roles.partials.info')
                        @include('Admin.usuarios.roles.partials.error')

                        <!-- form start -->

                        <div class="box-body">
                            @include('Admin.usuarios.permisos.partials.form')

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-xs-8">
                                <a class="btn btn-primary" href="{{ route('permissions.index') }}" permission="button">Regresar</a>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <div class="form-group">
                                    {{ Form::submit('Guardar', ['class' => 'btn  btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col (right) -->


            {!! Form::close() !!}
        </div>
    </section>


@endsection


@section('scripts')
    <script>

        $(document).ready(function () {

            $(function() {
                $('#file-input').change(function(e) {
                addImage(e);
                });

                function addImage(e){
                var file = e.target.files[0],
                imageType = /image.*/;

                if (!file.type.match(imageType))
                return;

                var reader = new FileReader();
                reader.onload = fileOnload;
                reader.readAsDataURL(file);
                }

                function fileOnload(e) {
                var result=e.target.result;
                $('#imgSalida').attr("src",result);
                }
            });
        });

    </script>

@endsection
