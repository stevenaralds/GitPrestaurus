<div class="form-group">

        {{-- {!! Form::open(['route' => 'cliente.buscar']) !!} --}}
            {{ Form::label('name', 'Buscar Cliente') }}

            <div class="input-group input-group-lg" >

                {{ Form::text('buscar', null, ['class' => 'form-control', 'id' => 'buscar','placeholder' => 'Buscar']) }}
                <div class="input-group-btn">

                    {{ Form::submit('Buscar', ['class' => 'btn btn-primary ']) }}

                </div>
            </div>

        {{-- {!! Form::close() !!} --}}

    </div>
