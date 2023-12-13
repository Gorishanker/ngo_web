@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        // 'title' => trans_choice('content.change_password', 1),
        'breadcrumbs' => Breadcrumbs::render('admin.change-password'),
    ])
    <div>
        @include('admin.admin_profile.navbar')
    </div>
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

            <div class="grid grid-cols-12 gap-5">

                <div class="col-span-12">

                    <div class="box">

                        <div class="p-5">

                            <!--begin::Form-->
                            {{ Form::model([], ['url' => route('admin.update.password', ['user' => $auth_user->id]), 'method' => 'PATCH', 'files' => true, 'class' => 'form mb-15', 'role' => 'form', 'id' => 'adminForm']) }}
                            @csrf
                            {{-- <input type="hidden" name="_method" value="PUT"> --}}
                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6" style="position: relative">
                                    <label class="required">{{ trans_choice('content.old_password_title', 1) }}</label>
                                    {!! Form::password('old_password', [
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                        'id' => 'old_password',
                                        'placeholder' => __('placeholder.enter_old_password'),
                                    ]) !!}
                                    <i class="fa fa-eye" id="toggleOldPassword"
                                        style="position: absolute;top: 38px;right: 20px;font-size: 19px;z-index:999;color:rgb(0, 0, 0);">
                                    </i>
                                    @if ($errors->has('old_password'))
                                        <span
                                            class="error invalid-feedback d-block">{{ $errors->first('old_password') }}</span>
                                    @endif
                                </div>
                                <div class="col-span-12 xl:col-span-6" style="position: relative">
                                    <label class="required">{{ trans_choice('content.new_password_title', 1) }}</label>
                                    {!! Form::password('password', [
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                        'id' => 'new_password',
                                        'placeholder' => __('placeholder.enter_new_password'),
                                    ]) !!}
                                    <i class="fa fa-eye" id="toggleNewPassword"
                                        style="position: absolute;top: 38px;right: 20px;font-size: 19px;z-index:999;color:rgb(0, 0, 0);">
                                    </i>
                                    @if ($errors->has('password'))
                                        <span class="error invalid-feedback d-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6" style="position: relative">
                                    <label
                                        class="required">{{ trans_choice('content.confirm_new_password_title', 1) }}</label>
                                    {!! Form::password('confirm_password', [
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                        'id' => 'confirm_password',
                                        'placeholder' => __('placeholder.enter_confirm_password'),
                                    ]) !!}
                                    <i class="fa fa-eye" id="toggleConfirmPassword"
                                        style="position: absolute;top: 38px;right: 20px;font-size: 19px;z-index:999;color:rgb(0, 0, 0);">
                                    </i>
                                    @if ($errors->has('confirm_password'))
                                        <span
                                            class="error invalid-feedback d-block">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-5 mt-6">
                            </div>
                            <div class="text-right mt-6">
                                <div class="mr-6">
                                    <button type="button" class="button w-24 bg-theme-1 text-white">
                                        <a href="{{ route('admin.dashboard') }}">Back</a>
                                    </button>
                                    <button id="submit_btn" type="submit"
                                        class="button bg-theme-1 mr-2 text-white">{{ __('content.create_title') }}</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Careers - Apply-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdminChangePasswordRequest', 'form') !!}
    <script>
        $('#toggleOldPassword').click(function() {

            if ($(this).hasClass('fa-eye')) {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#old_password').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#old_password').attr('type', 'password');
            }
        });

        $('#toggleNewPassword').click(function() {

            if ($(this).hasClass('fa-eye')) {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#new_password').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#new_password').attr('type', 'password');
            }
        });

        $('#toggleConfirmPassword').click(function() {

            if ($(this).hasClass('fa-eye')) {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#confirm_password').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#confirm_password').attr('type', 'password');
            }
        });
    </script>
@endpush
