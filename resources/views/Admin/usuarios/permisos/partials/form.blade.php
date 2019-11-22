<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Nombre del permiso') }}
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

