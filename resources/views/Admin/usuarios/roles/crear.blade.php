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
    <div class="breadcumb-area  ">

        <div class="text">
            <h1> Crear Role </h1>
        </div>
        <section class="content-header">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="{{ route('roles.index') }}">Roles</a></li>
              <li><a href="#">Crear role</a></li>
            </ol>

      </section>
    </div>

@endsection


@section('Contenido2')
    <section class="content">
        <div class="row">
        {!! Form::open(['route' => 'roles.store']) !!}
          <!-- left column -->
           <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Crear role</h3>
                </div>
                <!-- /.box-header -->

                  @include('Admin.usuarios.roles.partials.info')
                  @include('Admin.usuarios.roles.partials.error')

                <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre ') }}
                             {{ Form::text('name', null, ['class' => 'form-control ', 'id' => 'nombre']) }}
                        </div>
                        <div class="form-group">
                              {{ Form::label('slug', 'Slug') }}
                              {{ Form::text('display.name', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Descripción', 'Descripcion') }}
                            {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
                        </div>
                    </div>
                      <!-- /.box-body -->

                    <div class="box-footer">

                        <div class="col-xs-8">
                              <a class="btn btn-primary" href="{{ route('roles.index') }}" role="button">Regresar</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                          <div class="form-group">

                          </div>
                        </div>
                      </div>

              </div>
              <!-- /.box -->
           </div>

            <div class="col-md-6">
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


@endsection
