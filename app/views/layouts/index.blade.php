<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- HEADER -->
        @include('includes.head')

    </head>
    <body>
        <!-- NAVIGATION -->
        @include('includes.nav')

        <!-- Flash messages -->
        @include('includes.flash')

        <!-- BODY CONTENT -->
        @yield('content')


        <!-- FOOTER -->
        <footer>
            @include('includes.footer')
        </footer>

        <!-- Javascipts -->
        @include('includes.scripts')

        <!-- Custom scripts -->
        @yield('script')
    
        
    </body>
</html>