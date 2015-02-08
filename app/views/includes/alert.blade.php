@if(Session::has('alert'))
    @foreach(Session::get('alert') as $alert)
        <div class="row">
    	<div class="alert {{ $alert['class'] }} alert-dismissible col-sm-6 col-sm-offset-3"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $alert['message'] }}</div>
        </div>
    @endforeach
@endif