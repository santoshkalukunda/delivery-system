<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title') | Delivery System</title>

    @include('layouts.partials.style')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('layouts.partials.nav')
        <!-- START SIDEBAR-->
        @include('layouts.partials.sidebar')

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                @include('alerts.all')
                @yield('content')
                <!-- END PAGE CONTENT-->
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    @include('layouts.partials.script')

</body>

</html>