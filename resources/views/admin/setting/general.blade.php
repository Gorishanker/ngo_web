@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'breadcrumbs' => Breadcrumbs::render('admin.settings.edit_general'),
    ])
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

            <div class="grid grid-cols-12 gap-5">

                <div class="col-span-12">

                    <div class="box">

                        <div class="p-5">

                            <!--begin::Form-->
                            {!! Form::open([
                                'route' => 'admin.settings.update_general',
                                'method' => 'POST',
                                'class' => 'form mb-15',
                                'enctype' => 'multipart/form-data',
                                'onsubmit' => 'return checkForm(this);',
                            ]) !!}
                            @csrf

                            <div class="col-span-12">
                                <div class="box mt-5 p-5">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            General setting
                                        </h2>
                                    </div>
                                    <div class="grid grid-cols-12 gap-5 mt-5">
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Site Name</label>
                                            {!! Form::text('data[site_name]', isset($settings['site_name']) ? $settings['site_name'] : null, [
                                                'placeholder' => __('placeholder.site_name'),
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Meta-Title</label>
                                            {!! Form::text('data[web_site_name]', isset($settings['web_site_name']) ? $settings['web_site_name'] : null, [
                                                'placeholder' => __('placeholder.web_site_name'),
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">{{ trans_choice('content.setting.copyright_text_title', 1) }}</label>
                                            {!! Form::text('data[copyright_text]', isset($settings['copyright_text']) ? $settings['copyright_text'] : null, [
                                                'placeholder' => __('placeholder.copyright_text'),
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">{{ trans_choice('content.setting.email_title', 1) }}</label>
                                            {!! Form::text('data[email]', isset($settings['email']) ? $settings['email'] : null, [
                                                'placeholder' => __('placeholder.email_title'),
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">{{ trans_choice('content.setting.contact_number_title', 1) }}</label>
                                            {!! Form::text('data[contact_number]', isset($settings['contact_number']) ? $settings['contact_number'] : null, [
                                                'placeholder' => __('placeholder.contact_number_title'),
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">Address</label>
                                            {!! Form::text(
                                                'data[address]',
                                                isset($settings['address']) ? $settings['address'] : null,
                                                [
                                                    'placeholder' => 'Address',
                                                    'class' => 'input w-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">Time</label>
                                            {!! Form::text('data[available_time]', isset($settings['available_time']) ? $settings['available_time'] : null, [
                                                'placeholder' => 'Time',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">Letest campaign video url</label>
                                            {!! Form::text('data[letest_campaign_video_url]', isset($settings['letest_campaign_video_url']) ? $settings['letest_campaign_video_url'] : null, [
                                                'placeholder' => 'Letest campaign video url',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>


                                        <div class="col-span-12 xl:col-span-12">
                                            <label
                                                class="required">About us</label>
                                            {!! Form::textarea(
                                                'data[about_company]',
                                                isset($settings['about_company']) ? $settings['about_company'] : null,
                                                [
                                                    'placeholder' => 'About us',
                                                    'rows' => 3,
                                                    'class' => 'input w-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>

                                   

                                        @php
                                            $logo_name = isset($settings['logo']) ? $settings['logo'] : null;
                                            if ($logo_name) {
                                                $logo_img = asset('files/settings/' . $settings['logo'] . '');
                                            } else {
                                                $logo_img = 'image-not-found.png';
                                            }
                                            $favicon_name = isset($settings['favicon']) ? $settings['favicon'] : null;
                                            if ($favicon_name) {
                                                $favicon_img = asset('files/settings/' . $settings['favicon'] . '');
                                            } else {
                                                $favicon_img = 'blank.png';
                                            }
                                        @endphp

                                        <div class="col-span-12 xl:col-span-4">
                                            <label class="required">Logo</label>
                                            {!! Form::file('data[logo]', [
                                                'class' => 'input w-full border bg-gray-100 mt-2',
                                                'id' => 'image',
                                                'onchange' => 'readURL(this, image);',
                                                'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
                                            ]) !!}

                                        </div>
                                        <div class="col-span-12 xl:col-span-2 mt-4">
                                            @if (isset($logo_img))
                                                <img id="backImage_image" height="100px" width="100px"
                                                    src="{{ $logo_img }}" title="Image">
                                            @else
                                                <img id="backImage_image" height="100px" width="100px"
                                                    src="{{ blankImageUrl() }}" title="Image">
                                            @endif
                                        </div>

                                        <div class="col-span-12 xl:col-span-4">
                                            <label class="required">Favicon Image</label>
                                            {!! Form::file('data[favicon]', [
                                                'class' => 'input w-full border bg-gray-100 mt-2',
                                                'id' => 'favicon',
                                                'onchange' => 'readURL(this, favicon);',
                                                'accept' => 'image/x-png,image/jpg,image/jpeg,image/svg,image/png,/ico',
                                                'placeholder' => __('Upload Profile Image '),
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-2 mt-4">
                                            @if (isset($favicon_img))
                                                <img id="backImage_favicon" height="100px" width="100px"
                                                    src="{{ $favicon_img }}" title="Image">
                                            @else
                                                <img id="backImage_favicon" height="100px" width="100px"
                                                    src="{{ blankImageUrl() }}" title="Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right mt-6">
                                    <div class="mr-6">
                                        <button type="submit" class="button bg-theme-1 mr-2 text-white">Update
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
    </div>
    @endsection

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Admin\SettingRequest', 'form') !!}
    @endpush
