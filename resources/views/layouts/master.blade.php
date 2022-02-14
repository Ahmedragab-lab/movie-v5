<!DOCTYPE html>
<html lang="en">
    <head>
       @include('layouts.head')
    </head>
    <body class="bg-theme bg-theme1">
    <!-- start loader -->
        <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
    <!-- end loader -->
    <!-- Start wrapper-->
        <div id="wrapper">
                    @include('layouts.sidebar')
                    @include('layouts.topbar')
                    <div class="clearfix"></div>
                    @yield('content')
                    <!--Start Back To Top Button-->
                    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
                    <!--End Back To Top Button-->
                    @include('layouts.footer')
        </div>
    <!--End wrapper-->
    @include('layouts.footerjs')
    </body>
</html>
