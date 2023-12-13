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

    <!--begin::Authentication - Sign-in -->
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="{{ route('admin.login') }}" class="-intro-x flex items-center pt-5">
                <img alt="Starrae" class="w-6"
                    src="{{ isset($global_setting_data['favicon']) ? asset('files/settings/' . $global_setting_data['favicon'] . '') : 'dist/images/logo.svg' }}">
                <span class="text-white text-lg ml-3">{{ $global_setting_data['site_name'] }}</span>
            </a>
            <div class="my-auto">
                <img alt="Starrae" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to
                    <br>
                    sign in to your account.
                </div>

            </div>
        </div>
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <!--begin::Form-->
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Change Password
                </h2>

                <div class="w-lg-520px px-20 py-0 mx-auto">
                    <form class="form w-100" id="kt_sign_in_form" method="POST"
                        action="{{ route('admin.verifyPassword') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="intro-x mt-8 position-relative">
                            <!--begin::Title-->
                            <input type="hidden" name="email" value="{{ $email }}">
                            <!--begin::Input-->
                            <div style="position: relative">
                                <input class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                                    placeholder="New Password" id="password" type="password" name="password" />
                                <i class="far fa-eye fa-eye-slash" id="togglePassword"
                                    style="position: absolute;top: 12px;right: 18px;font-size: 19px;z-index:999">
                                </i>
                            </div>
                            <!--end::Input-->
                            <div style="position: relative">
                                <!--begin::Input-->
                                <input class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                                    type="password" id="confirm_password" name="confirm_password"
                                    placeholder="Confirm New Password" />
                                <!--end::Input-->
                                <i class="far fa-eye fa-eye-slash" id="toggleConfirmPassword"
                                    style="position: absolute;top: 12px;right: 18px;font-size: 19px;z-index:999">
                                </i>
                            </div>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" id="submitBtn"
                                class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                                Continue
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <script>
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirm_password');

        toggleConfirmPassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ChangePasswordRequest', 'form') !!}
@endpush
