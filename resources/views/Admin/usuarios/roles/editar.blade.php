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
            <h1> Editar Roles </h1>
        </div>
        <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('roles.index') }}">Roles</a></li>
              <li><a href="#">{{$role->name}}</a></li>
            </ol>

      </section>
    </div>

@endsection


@section('Contenido2')
    <section class="content">
        <div class="row">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                <!-- left column -->
                <div class="col-md-12 col-lg-6 col-sm-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar role</h3>
                        </div>
                        <!-- /.box-header -->

                        @include('Admin.usuarios.roles.partials.info')
                        @include('Admin.usuarios.roles.partials.error')

                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Nombre de la etiqueta') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('slug', 'URL Amigable') }}
                                {{ Form::text('display_name', null, ['class' => 'form-control', 'id' => 'slug']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Descripción') }}
                                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                    <!-- /.col (left) -->
                    <div class="col-md-12 col-lg-6 col-sm-6">
                    <div class="box box-success">
                        <div class="box-header">
                          <h3 class="box-title"> Lista de Permisos</h3>
                        </div>
                        <div class="box-body">
                          <!-- Minimal style -->
                          @include('Admin.usuarios.roles.partials.form')
                          <!-- checkbox -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-xs-8">
                                <a class="btn btn-primary" href="{{ route('roles.index') }}" role="button">Regresar</a>
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
