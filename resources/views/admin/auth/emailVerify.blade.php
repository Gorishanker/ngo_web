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
                    Email Verify
                </h2>

                <form novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('admin.createOtp') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="intro-x mt-8">
                        <input class="intro-x login__input input input--lg border border-gray-300 block mt-4" type="text"
                            name="email" autocomplete="email" id="kt_sign" placeholder="Enter Email" readonly
                            value="{{ $user->email }}" />
                    </div>

                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" id="kt_sign_in_submit"
                            class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                            <span class="indicator-label">Continue</span>
                        </button>
                    </div>
                </form>

            </div>
            <!--begin::Actions-->
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EmailVerifyRequest', 'form') !!}
@endpush
