<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @yield('header')
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @yield('sidebar')

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                   @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        @yield('footer')
        
    </body>
</html>
