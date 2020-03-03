@if(Session::has('success'))
    @if(Session::get('success'))
        <div class="{{ Session::get('class') }}">
            {{ Session::get('message') }}
        </div>
    @elseif(Session::get('success') === false)
        <div class="{{ Session::get('class') }}">
            {{ Session::get('message') }}
        </div>
    @endif
@endif