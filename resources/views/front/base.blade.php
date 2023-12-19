<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home 01</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/images/favicon.ico') }}" />
    <!-- Plugin css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/flaticon.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/swiper.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/lightcase.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.nstSlider.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/flexslider.css') }}" media="all" />

    <!-- own style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/rtl.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" media="all" />

</head>

<body>
    <div class="box-style">
        <div class="color-btn">
            <a href="#"><i class="fa fa-cog fa-spin" aria-hidden="true"></i></a>
        </div>
        <div class="box-style-inner">
            <h3>Box Layout</h3>
            <div class="box-element">
                <div class="box-heading">
                    <h5>HTML Layout</h5>
                </div>
                <div class="box-content">
                    <ul class="box-customize">
                        <li><a class="boxed-btn" href="#">Boxed</a></li>
                        <li><a class="wide-btn" href="#">Wide</a></li>
                        <li><a class="rtl-btn" href="#">Rtl</a></li>
                        <li><a class="ltl-btn" href="#">Ltl</a></li>
                    </ul>
                </div>
            </div>
            <div class="box-element">
                <div class="box-heading">
                    <h5>Backgroud Images</h5>
                </div>
                <div class="box-content">
                    <ul class="box-bg-img">
                        <li>
                            <a class="bg-1" href="#"><img src="{{asset('front/images/box-style/01.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-2" href="#"><img src="{{asset('front/images/box-style/02.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-3" href="#"><img src="{{asset('front/images/box-style/03.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-4" href="#"><img src="{{asset('front/images/box-style/04.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-5" href="#"><img src="{{asset('front/images/box-style/05.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-6" href="#"><img src="{{asset('front/images/box-style/06.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-7" href="#"><img src="{{asset('front/images/box-style/07.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="bg-8" href="#"><img src="{{asset('front/images/box-style/08.jpg')}}"
                                    alt="greenforest"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-element">
                <div class="box-heading">
                    <h5>Backgroud Pattern</h5>
                </div>
                <div class="box-content">
                    <ul class="box-pattern-img">
                        <li>
                            <a class="pt-1" href="#"><img
                                    src="{{asset('front/images/pt-image/01.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-2" href="#"><img
                                    src="{{asset('front/images/pt-image/02.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-3" href="#"><img
                                    src="{{asset('front/images/pt-image/03.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-4" href="#"><img
                                    src="{{asset('front/images/pt-image/04.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-5" href="#"><img
                                    src="{{asset('front/images/pt-image/05.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-6" href="#"><img
                                    src="{{asset('front/images/pt-image/06.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-7" href="#"><img
                                    src="{{asset('front/images/pt-image/07.png')}}"
                                    alt="greenforest"></a>
                        </li>
                        <li>
                            <a class="pt-8" href="#"><img
                                    src="{{asset('front/images/pt-image/08.png')}}"
                                    alt="greenforest"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Pre-Loader-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!-- Start Pre-Loader -->

    <div class="box-layout">
        @include('front.header')

        @yield('content')

        @include('front.footer')
        <!-- javascript -->
        <script type="text/javascript" src="{{ asset('front/js/jquery-2.2.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/swiper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/lightcase.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.nstSlider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.flexslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/custom.map.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/plugins.isotope.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/custom.isotope.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/custom.js') }}"></script>
        @stack('scripts')
    </div>
</body>

</html>
