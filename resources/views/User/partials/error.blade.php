@if(count($errors))
<div id="alert" class="alert alert-danger ">
    <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif
