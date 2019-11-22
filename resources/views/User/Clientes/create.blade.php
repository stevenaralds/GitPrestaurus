{{-- crear nvo registro --}}



@extends('Layouts.Master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection


@section('Contenido')
    <div class="breadcumb-area flex-style ">

        <div class="text">
            <h1> clientes </h1>
        </div>

    </div>
@endsection

@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            {{-- <li><a href="#">{{ $objcliente->cedula }}</a></li> --}}

        </div>
    </div>

@endsection

@section('Contenido2')


<section class="content">
    <div class="row">
        {!! Form::open(['route' => 'clientes.store']) !!}
            <!-- left column -->
            <div class="col-md-12 col-lg-6 col-sm-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Cliente</h3>
                    </div>
                    <!-- /.box-header -->

                    @include('User.partials.info')
                    @include('User.partials.error')

                    <!-- form start -->

                    <div class="box-body">
                        @include('user.clientes.partials.form')

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (right) -->

        {!! Form::close() !!}
    </div>
</section>
@endsection




