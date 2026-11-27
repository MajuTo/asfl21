@if(Session::has('alert'))
    <div class="container">
        @foreach(Session::get('alert') as $alert)
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="alert {{ $alert['class'] }} alert-dismissible fade show" role="alert">
                        {{ $alert['message'] }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
