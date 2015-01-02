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

        @section('test')
            <h1>eirjesriogjrseiogjesr g</h1>
        @stop

        

        <!-- Footer -->
        <footer>
            @include('includes.footer')
        </footer>

        <!-- Javascript -->
        @include('includes.scripts')

        @yield('script')

    </body>

</html>