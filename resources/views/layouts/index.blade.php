<!DOCTYPE html>
<html lang="fr" class="h-100">
    <head>
        <!-- HEADER -->
        @include('includes.head')
        @yield('css')
    </head>
    <body class="d-flex flex-column h-100">
        <!-- NAVIGATION -->
{{--        <div class="container" id="nav-container">--}}
            @include('includes.nav')
{{--        </div>--}}

        <!-- Flash messages -->
        @include('includes.alert')

        <!-- BODY CONTENT -->
        <div class="container flex-shrink-0 mb-3" id="content-container">
            @yield('content')
        </div>


        <!-- FOOTER -->
{{--        <div class="container" id="footer-container">--}}
            @include('includes.footer')
{{--        </div>--}}

        <!-- Javascipts -->
        @include('includes.scripts')

        <!-- Custom scripts -->
        @yield('script')
    </body>
</html>
