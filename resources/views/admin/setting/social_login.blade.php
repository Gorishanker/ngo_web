@extends('admin.layouts.base')

@section('title')
    <title>{{ __('header.setting.edit_social_login') }}</title>
@endsection

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('content.setting.edit_social_login'),
        'breadcrumbs' => Breadcrumbs::render('admin.settings.edit_social_login'),
    ])

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

            <div class="grid grid-cols-12 gap-5">

                <div class="col-span-12">

                    <div class="box">

                        <div class="p-5">

                            <!--begin::Form-->
                            {!! Form::open([
                                'route' => 'admin.settings.update_social_login',
                                'method' => 'POST',
                                'class' => 'form mb-15',
                                'enctype' => 'multipart/form-data',
                                'onsubmit' => 'return checkForm(this);',
                            ]) !!}
                            @csrf

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <label>{{ trans_choice('content.setting.facebook_title', 1) }}</label>
                                    {!! Form::text('data[facebook]', isset($settings['facebook']) ? $settings['facebook'] : null, [
                                        'placeholder' => __('placeholder.facebook_title'),
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <label>{{ trans_choice('content.setting.instagram_title', 1) }}</label>
                                    {!! Form::text('data[instagram]', isset($settings['instagram']) ? $settings['instagram'] : null, [
                                        'placeholder' => __('placeholder.instagram_title'),
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <label>{{ trans_choice('content.setting.twitter_title', 1) }}</label>
                                    {!! Form::text('data[twitter]', isset($settings['twitter']) ? $settings['twitter'] : null, [
                                        'placeholder' => __('placeholder.twitter_title'),
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <label>{{ trans_choice('content.setting.youtube_title', 1) }}</label>
                                    {!! Form::text('data[youtube]', isset($settings['youtube']) ? $settings['youtube'] : null, [
                                        'placeholder' => __('placeholder.youtube_title'),
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="text-right mt-6">
                                <div class="mr-6">
                                    <button id="submitBtn" type="submit" class="button bg-theme-1 mr-2 text-white">Update
                                    </button>
                                </div>
                            </div>
                            <!--end::Actions-->
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\SettingSocialLoginRequest', 'form') !!}
@endpush
