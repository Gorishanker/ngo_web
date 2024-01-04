@extends('admin.layouts.app')
@section('content')
    @if (Session::has('error'))
        <div style="position: relative;">
            <div id="ns" class="rounded-md items-center px-5 py-4 mb-2 bg-theme-6 text-white mt-2"
                style="position: absolute; width: 46%; right: 80px; display: flex; align-items: center;justify-content: space-between;">
                <p class="mb-0" style="position: relative;z-index:9999; text-align:right; font-size:15px;margin-left:19px">
                    {{ $message = Session::get('error') }}
                </p>
            </div>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div style="position: relative;">
            <div id="ns" class="rounded-md items-center px-5 py-4 mb-2 bg-theme-9 text-white mt-2"
                style="position: absolute; width: 46%; right: 80px; display: flex; align-items: center;justify-content: space-between;">
                <p class="mb-0"
                    style="position: relative;z-index:9999; text-align:right; font-size:15px;margin-left:19px">
                    {{ $message = Session::get('success') }}
                </p>
            </div>
        </div>
    @endif
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="{{ route('admin.login') }}" class="-intro-x flex items-center pt-5">
                <img alt="Starrae" style="max-width:230px; max-height:46px;" 
                    src="{{ isset($global_setting_data['logo']) ? asset('files/settings/' . $global_setting_data['logo'] . '') : 'dist/images/logo.svg' }}">
                <span
                    class="text-white text-lg ml-3">{{ isset($global_setting_data['site_name']) ? $global_setting_data['site_name'] : 'na' }}</span>
            </a>
            <div class="my-auto">
                <img alt="Starrae" src="dist/images/illustration.svg"  class="-intro-x w-1/2 -mt-16" style="width: 60%">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to
                    <br>
                    sign in to your account.
                </div>

            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In to {{getSettingDataBySlug('site_name')}}
                </h2>

                <form class="" id="kt_sign_in_form" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="intro-x mt-8 position-relative">
                        <div>
                            <input class="intro-x login__input input input--lg border border-gray-300 block"
                                placeholder="Email" type="text" value="" name="email"
                                autocomplete="on" />
                        </div>
                        <div style="position: relative">
                            <input id="id_password" type="password" value="" name="password"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                                placeholder="Password">
                            <i class="far fa-eye fa-eye-slash" id="togglePassword"
                                style="position: absolute;top: 12px;right: 18px;font-size: 19px;z-index:999">
                            </i>
                        </div>

                    </div>
                    <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            {{-- <input type="checkbox" class="input border mr-2" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label> --}}
                        </div>
                        {{-- <a href="{{ route('admin.forgetPassword') }}">Forgot Password?</a> --}}
                    </div>

                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" id="submitBtn"
                            class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3"> <span
                                class="indicator-label">Login</span>
                            {{-- <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span> --}}
                        </button>
                        {{-- <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign
                            up</button> --}}
                    </div>
                </form>

            </div>
        </div>
        <!-- END: Login Form -->
    </div>
    <!--end::Authentication - Sign-in-->
@endsection
@push('styles')
<style>
    #submitBtn:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
</style>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\LoginRequest', 'form') !!}
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endpush
