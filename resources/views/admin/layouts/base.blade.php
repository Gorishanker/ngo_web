<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>

    <meta charset="utf-8">
    <link
        href="{{ isset($global_setting_data['favicon']) ? asset('files/settings/' . $global_setting_data['favicon'] . '') : asset('admin/dist/images/logo.svg') }}"
        rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Radiant Wellness">
    <meta name="keywords" content="radiant wellness">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="author" content="Radiant wellness">
    <title>{{ $site_name }}</title>

    @include('admin.layouts.core-css')
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9;
            background: url({{ asset('files/settings/loader.gif') }}) 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>

    @stack('styles')

</head>
<!--end::Head-->
<!--begin::Body-->
{{-- @dd(asset('files/settings/loader.gif')) --}}

<body class="app" style="word-wrap: break-word">

    <!--begin::Main-->
    <div class="loader"></div>
    <!-- BEGIN: Mobile Menu -->
    @include('admin.layouts.components.mobile_menu')
    <!-- END: Mobile Menu -->

    <!--begin::Main-->

    <!--begin::Root-->
    <div class="flex">
        <!--begin::Page-->
        @include('admin.layouts.components.sidebar')

        <div class="content">

            @include('admin.layouts.components.topbar')
            @yield('content')

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="summernote_content">
        </code>
    </div>
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="exercise_content_1">
        </code>
    </div>
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="exercise_content_2">
        </code>
    </div>
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="exercise_content_3">
        </code>
    </div>
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="exercise_content_4">
        </code>
    </div>
    <div class="row" style="display:none;">
        <code class="col-xs-12" id="exercise_content_5">
        </code>
    </div>
</body>
<!--end::Body-->
@include('admin.layouts.core-js')
@stack('scripts')
@include('admin.layouts.components.custom_js.summernote')

<script>
    $(window).on('load', function() {
        $(".loader").fadeOut(1000);
    })
</script>

</html>
