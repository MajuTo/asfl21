@if(Session::has('alert'))
    @foreach(Session::get('alert') as $alert)
    	<div class="alert {{ $alert['class'] }} alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $alert['message'] }}</div>
    @endforeach
@endif