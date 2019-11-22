


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
            <h1> Prestamo </h1>
        </div>

    </div>
@endsection

@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="{{ route('prestamos.index') }}">Buscar Cliente</a>
            {{-- <li><a href="#">{{ $objcliente->cedula }}</a></li> --}}

        </div>
    </div>

@endsection

@section('Contenido2')


<section class="content">
    <div class="row">

            <!-- left column -->
            <div class="col-md-12 col-lg-6 col-sm-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Buscar Cliente</h3>
                    </div>
                    <!-- /.box-header -->

                    @include('User.partials.info')
                    @include('User.partials.error')

                    <!-- form start -->

                    <div class="box-body">
                        {!! Form::open(['route' => 'prestamoscliente.get']) !!}
                            @include('user.prestamos.partials.formcliente')
                        {!! Form::close() !!}


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (right) -->


    </div>
</section>
@endsection




