{{-- editar prestamo --}}



@extends('Layouts.Master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection




@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="{{ route('clientes.index') }}">Prestamos</a>
            <a href="#">Código de prestamo:{{ $objprestamo->id }}</a>

        </div>
    </div>

@endsection

@section('Contenido2')


<section class="content">
    <div class="row">

        {{-- {!! Form::model($objprestamo, ['route' => ['prestamos.update', $objprestamo->id], 'method' => 'PUT']) !!} --}}
            <!-- left column -->
            <div class="col-md-12 col-lg-6 col-sm-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Prestamo</h3>
                    </div>
                    <!-- /.box-header -->

                    @include('User.partials.info')
                    @include('User.partials.error')

                    <!-- form start -->

                    <div class="box-body">



                        {!! Form::model($objprestamo  , ['route' => ['prestamos.update', $objprestamo->id], 'method' => 'PUT']) !!}
                            @include('user.prestamos.partials.form')
                        {!! Form::close() !!}



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (right) -->

        {{-- {!! Form::close() !!} --}}
    </div>
</section>
@endsection




