<!DOCTYPE html>
<html lang="fr">

    <head>
        
        <!-- Inclusion de tout le head (meta, css, js ...) -->
        @include('includes.head')

    </head>

    <body>

        
        @include('includes.nav')

        @include('includes.flash')

        @yield('content')

        

        <!-- Footer -->
        <footer>
            @include('includes.footer')
        </footer>

        <!-- Javascript -->
        @include('includes.scripts')

        @yield('script')

    </body>

</html>