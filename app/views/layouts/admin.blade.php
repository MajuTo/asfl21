<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- HEADER -->
        @include('includes.head')
    </head>
    <body>
        <div class="container">
            <!-- NAVIGATION -->
            @include('includes.nav')
            <!-- Flash messages -->
            @include('includes.alert')
            <!-- BODY CONTENT -->
            <div id="content-container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Tableau de bord Admin</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        @include('admin.menu')
                    </div>
                    <div class="col-sm-10">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            @include('includes.footer')
        </div>
        <!-- Javascipts -->
        @include('includes.scripts')
        <!-- Custom scripts -->
        @yield('script')
    </body>
</html>