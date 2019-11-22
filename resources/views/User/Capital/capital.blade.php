{{-- editar --}}

@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection


@section('breadcrumb')

    <div class="body2">
        <div class="breadcrumb2 flat">
            <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Inicio</a>
            <a href="#">Mi Capital</a>

        </div>
    </div>

@endsection


@section('Contenido2')
    <section class="content">
        <div class="row">

        {!! Form::model($objcapital, ['route' => ['capital.agregar', $objcapital->id], 'method' => 'PUT']) !!}
          <!-- left column -->
           <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Capital Total</h3>
                </div>
                <!-- /.box-header -->

                  @include('User.partials.info')
                  @include('User.partials.error')

                <!-- form start -->

                    <div class="box-body">

                        <div class="form-group">
                                {{ $objcapital->capitaltotal }}
                            {{-- {{ Form::label('capitaltota', {{ $objcapital->capitaltotal }} ) }} --}}

                        </div>

                    </div>
                      <!-- /.box-body -->

                    <div class="box-footer">

                        <!-- /.col -->
                        <div class="col-xs-6">
                          <div class="form-group">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mi-modalagregar" >Agregar</button>
                          </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mi-modal" >Retirar</button>
                            </div>
                        </div>
                    </div>


              </div>
              <!-- /.box -->
           </div>


            <!-- /.col (right) -->
        {!! Form::close() !!}
        </div>


        <section class="content">
            <div class="modal modal-danger fade" id="mi-modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Retiros</h4>
                    </div>
                    {!! Form::model($objcapital, ['route' => ['capital.retirar', $objcapital->id], 'method' => 'PUT']) !!}
                        <div class="modal-body">
                            <div class="form-group">
                                    {{ $objcapital->capitaltotal }}
                                {{-- {{ Form::label('capitaltota', {{ $objcapital->capitaltotal }} ) }} --}}
                            </div>
                            <div class="form-group">
                                  {{ Form::label('monto', 'Monto a modificar') }}
                                  {{ Form::text('monto', null, ['class' => 'form-control', 'id' => 'monto']) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                          {{ Form::submit('Retirar', ['class' => 'btn btn-outline']) }}
                        </div>
                    {!! Form::close() !!}
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </section>

        <section class="content">
                <div class="modal modal-success fade" id="mi-modalagregar">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Agregar</h4>
                            </div>
                            {!! Form::model($objcapital, ['route' => ['capital.agregar', $objcapital->id], 'method' => 'PUT']) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                            {{ $objcapital->capitaltotal }}
                                        {{-- {{ Form::label('capitaltota', {{ $objcapital->capitaltotal }} ) }} --}}

                                    </div>
                                    <div class="form-group">
                                          {{ Form::label('monto', 'Monto a modificar') }}
                                          {{ Form::text('monto', null, ['class' => 'form-control', 'id' => 'monto']) }}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                  {{ Form::submit('Agregar', ['class' => 'btn btn-outline']) }}
                                </div>
                            {!! Form::close() !!}
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
        </section>

    </section>


@endsection


@section('scripts')


@endsection
