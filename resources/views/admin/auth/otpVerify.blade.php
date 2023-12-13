@extends('admin.layouts.app')
@section('content')
    <!--begin::Authentication - Sign-in -->
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
                <img alt="Starrae" class="w-6"
                    src="{{ isset($global_setting_data['favicon']) ? asset('files/settings/' . $global_setting_data['favicon'] . '') : 'dist/images/logo.svg' }}">
                <span class="text-white text-lg ml-3">{{ $global_setting_data['site_name'] }}</span> </a>
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
                    OTP Verify
                </h2>
                <!--begin::Wrapper-->
                <div class="w-lg-520px px-20 py-0 mx-auto">
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                        action="{{ route('admin.otpVerify') }}">
                        @csrf
                        <input type="hidden" name="type" value="create_otp">
                        <!--begin::Heading-->
                        <div class="intro-x mt-8">

                            <input class="intro-x login__input input input--lg border border-gray-300 block mt-4 "
                                type="email" name="email" value="{{ $email }}" id="email_veryify"
                                autocomplete="off" />
                            <!--end::Input-->

                            <input type="hidden" name="email" value="{{ $email }}">
                            <!--begin::Wrapper-->
                            <!--begin::Input-->
                            <input
                                class="intro-x login__input input input--lg border border-gray-300 block mt-4 only_number"
                                type="text" name="otp" autocomplete="off" placeholder="OTP" />
                            <span class="d-block mb-2" id="removeCodeExpireText">Code expires in: <a
                                    href="javascript:void(0)" class="cod-one" id="timeLeft">1 Min</a></span>
                            {{-- <span class="d-block">Didn’t receive code? <a href="javascript:void(0)" id="resendOtpCode"
                                    class="r-cod">Resend
                                    Code</a></span> --}}
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" id="kt_sign_in_submit"
                                class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                                <span class="indicator-label">Continue</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>

                    {{-- <form class="d-inline" method="POST" action="{{ route('admin.createOtp') }}">
                        @csrf
                        <input type="hidden" name="type" value="resend_otp">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <button type="submit" id="forgotPasswordBtn" class="btn btn-link p-0 m-0 align-baseline"></button>
                    </form> --}}
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Admin\OtpVerifyRequest', 'form') !!}

        <script>
            $('#email_veryify').attr('disabled', true);
            $('#forgotPasswordBtn').attr('disabled', true); // to disable
            setTimeout(function() {
                $('#forgotPasswordBtn').attr('disabled', false); // to enable
            }, 120000);

            $(document).ready(function() {
                var countdownNum = 60;
                incTimer();

                function incTimer() {
                    setTimeout(function() {
                        if (countdownNum != 0) {
                            countdownNum--;
                            document.getElementById('timeLeft').innerHTML = countdownNum +
                                ' Sec';
                            incTimer();
                        } else {
                            document.getElementById('timeLeft').innerHTML = 'Ready!';
                            $('#removeCodeExpireText').html('');
                            $("#resendOtpCode").removeClass("r-cod");
                        }
                    }, 1000);
                }
            });
        </script>
    @endpush
