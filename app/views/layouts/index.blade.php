<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- HEADER -->
        @include('includes.head')
        @yield('css')
    </head>
    <body>
        <div class="container-fluid">
            <!-- NAVIGATION -->
            @include('includes.nav')

            <!-- Flash messages -->
            @include('includes.alert')

            <!-- BODY CONTENT -->
            @yield('content')


            <!-- FOOTER -->
            @include('includes.footer')

            <!-- Javascipts -->
            @include('includes.scripts')

            <!-- Custom scripts -->
            @yield('script')
        </div>


    </body>
</html>