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
            <h1> Editar Usuario </h1>
        </div>
        <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li><a href="#">{{$user->nombre}}</a></li>
            </ol>

      </section>
    </div>

@endsection


@section('Contenido2')

    <section class="content">
        <div class="row">

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> Lista de Permisos</h3>
                        </div>
                        @include('Admin.usuarios.roles.partials.info')
                        @include('Admin.usuarios.roles.partials.error')
                        <div class="box-body">
                            <div class="form-group has-feedback">

                                <div class="pull-center image">
                                    <img id="imgSalida"  src="/images/user2-160x160.jpg" class=" center-block img-responsive img-circle">

                                </div>
                                <div>
                                    <label for="file-input" class="upload-button">Subir archivo</label>
                                    <input id="file-input" name="file-input" type="file" style="display:none" />
                                </div>

                                </div>
                                <div class="form-group">

                                    {{ Form::label('nombre', 'Nombre ') }}
                                    {{ Form::text('nombre', null, ['class' => 'form-control ', 'id' => 'nombre']) }}

                                    @error('nombre')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}
                                    {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('Admin.usuarios.partials.form')
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="box box-primary">
                        <div class="box-footer">
                            <div class="col-xs-6">
                                <a class="btn btn-primary" href="{{ route('users.index') }}" role="button">Regresar</a>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {{ Form::submit('Guardar', ['class' => 'btn  btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
