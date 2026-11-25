<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{--<meta name="_token" content="{{ csrf_token() }}" />--}}
{{--<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon-child.ico') }}">--}}
@yield('title')

<!-- GOOGLE MAP API -->
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAPS_API_KEY') !!}">
</script>

<!-- CSS -->
{{ Html::style('assets/bootstrap/css/bootstrap.min.css') }}
{{ Html::style('assets/font-awesome/css/font-awesome.min.css') }}
{{--{{ Html::style('assets/fontawesome-free-6.2.1-web/css/font-awesome.min.css') }}--}}
<!-- {{ Html::style('assets/css/custom.css') }} -->
{{ Html::style('assets/css/new-design.css') }}
{{ Html::style('assets/leaflet/leaflet.css') }}

