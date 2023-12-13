<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link href="{{ asset('front/css/font.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
    @stack('styles')
</head>

<body>
    <div class="as_loader">
        <img src="{{ asset('front/images/loader-new.png') }}" alt="loader" title="loader" class="img-responsive">
    </div>
    <div class="as_main_wrapper">
        @include('front.header')

        @yield('content')

        @include('front.footer')
    </div>


        <!-- javascript -->
        <script src="{{ asset('front/js/jquery.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.countTo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/datepicker.en.js') }}"></script>
        <script src="{{ asset('front/js/custom.js') }}"></script>
        @stack('scripts')
  </body>

    </html>
