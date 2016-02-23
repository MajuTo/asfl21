<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- HEADER -->
        @include('includes.head')
        @yield('css')
    </head>
    <body>
        <!-- NAVIGATION -->
        <div class="container-fluid" id="nav-container">
            @include('includes.nav')
        </div>

        <!-- Flash messages -->
        @include('includes.alert')

        <!-- BODY CONTENT -->
        <div class="container" id="content-container">
            @yield('content')
        </div>


        <!-- FOOTER -->
        <div class="container-fluid" id="footer-container">
            @include('includes.footer')
        </div>

        <!-- Javascipts -->
        @include('includes.scripts')

        <!-- Custom scripts -->
        @yield('script')
    </body>
</html>