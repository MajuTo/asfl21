<form action="{{ $attributes->get('action') ?: '' }}"
      method="{{ strtoupper($attributes->get('method')) ?: 'POST' }}"
>
    @unless(in_array(strtoupper($attributes->get('method')) ?: 'POST', ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless
    {{ $slot }}
</form>

