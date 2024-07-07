@if(session()->has('alert'))
    @foreach(session()->get('alert') as $alert)
        <div class="alert {{ $alert['class'] }} alert-dismissible col-sm-6 offset-3 fade show" role="alert">
            {{ $alert['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
