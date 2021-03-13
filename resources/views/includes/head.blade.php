<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{--<meta name="_token" content="{{ csrf_token() }}" />--}}
<link rel="icon" type="image/png" href="{{ asset('img/favicon-child.ico') }}">
@yield('title')

<!-- GOOGLE MAP API -->
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAPS_API_KEY') !!}">
</script>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/new-design.css') }}"/>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
