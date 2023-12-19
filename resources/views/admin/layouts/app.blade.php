<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>GREEN FOREST Login</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />

    <link rel="shortcut icon" href="{{ isset($favicon_img) ? $favicon_img : 'na' }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin/dist/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
    html {
        background: #8cbc50 !importent;
    }
    
</style>
@stack('styles')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login">
    <!--begin::Main-->
    <div class="container sm:px-10">
        @yield('content')
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    @include('admin.layouts.core-js')

    @stack('scripts')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
