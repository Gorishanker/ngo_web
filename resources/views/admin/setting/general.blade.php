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
                                            <label class="required">Meta-Title Name</label>
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
                                                class="required">{{ trans_choice('content.free_questation_limit', 1) }}</label>
                                            {!! Form::text(
                                                'data[free_questation_limit]',
                                                isset($settings['free_questation_limit']) ? $settings['free_questation_limit'] : null,
                                                [
                                                    'placeholder' => trans_choice('content.free_questation_limit', 1),
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2 only_number',
                                                ],
                                            ) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label
                                                class="required">{{ trans_choice('content.reward_point_value', 1) }}</label>
                                            {!! Form::text(
                                                'data[reward_point_value]',
                                                isset($settings['reward_point_value']) ? $settings['reward_point_value'] : null,
                                                [
                                                    'placeholder' => trans_choice('content.reward_point_value', 1),
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2 only_number',
                                                ],
                                            ) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">{{ trans_choice('content.chat_session_time', 1) }} (in
                                                minutes)</label>
                                            {!! Form::text(
                                                'data[chat_session_time]',
                                                isset($settings['chat_session_time']) ? $settings['chat_session_time'] : null,
                                                [
                                                    'placeholder' => trans_choice('content.chat_session_time', 1),
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2 only_number',
                                                ],
                                            ) !!}
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

                                        <div class="col-span-12 xl:col-span-12">
                                            <label
                                                class="required">{{ trans_choice('content.setting.about_company_title', 1) }}</label>
                                            {!! Form::textarea(
                                                'data[about_company]',
                                                isset($settings['about_company']) ? $settings['about_company'] : null,
                                                [
                                                    'placeholder' => __('placeholder.about_company_title'),
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

                                <div class="col-span-12">
                                    <div class="box mt-5 p-5">
                                        <div class="intro-y flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                App Details
                                            </h2>
                                        </div>
                                        <div class="grid grid-cols-12 gap-5 mt-5">
                                            <div class="col-span-12 xl:col-span-6">
                                                <label>Android App Link</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[app-android-link]',
                                                    isset($settings['app-android-link']) ? $settings['app-android-link'] : null,
                                                    [
                                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => 'Android App Link',
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.app-android-link'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.app-android-link') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-span-12 xl:col-span-6">
                                                <label>IOS App Link</label><span class="text-theme-6">*</span>
                                                {!! Form::text('data[app-ios-link]', isset($settings['app-ios-link']) ? $settings['app-ios-link'] : null, [
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                    'placeholder' => 'IOS App Link',
                                                ]) !!}
                                                @if ($errors->has('data.app-ios-link'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.app-ios-link') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-span-12 xl:col-span-6">
                                                <label>FAQ Link</label><span class="text-theme-6">*</span>
                                                {!! Form::text('data[faq-link]', isset($settings['faq-link']) ? $settings['faq-link'] : url('/faq'), [
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                    'placeholder' => 'FAQ Link',
                                                ]) !!}
                                                @if ($errors->has('data.faq-link'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.faq-link') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-span-12 xl:col-span-6">
                                                <label>How It's Work Video Link</label><span class="text-theme-6">*</span>
                                                {!! Form::text('data[how-its-work]', isset($settings['how-its-work']) ? $settings['how-its-work'] : null, [
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                    'placeholder' => "How It's Work Video Link",
                                                ]) !!}
                                                @if ($errors->has('data.how-its-work'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.how-its-work') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-span-12 xl:col-span-6">
                                                <label>Minimum App Version Require</label><span
                                                    class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[min_version_required]',
                                                    isset($settings['min_version_required']) ? $settings['min_version_required'] : null,
                                                    ['class' => 'input w-full rounded-full border bg-gray-100 mt-2', 'placeholder' => 'Minimum App Version Require'],
                                                ) !!}
                                                @if ($errors->has('data.min_version_required'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.min_version_required') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <div class="box mt-5 p-5">
                                        <div class="intro-y flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                {{ trans_choice('content.point', 2) }}</h2>
                                        </div>
                                        <div class="grid grid-cols-12 gap-5 mt-5">
                                            
                                            <div class="col-span-12 xl:col-span-6">
                                                <label>{{ trans_choice('content.points_buy_in', 1) }}</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[points_buy_in]',
                                                    isset($settings['points_buy_in']) ? $settings['points_buy_in'] : null,
                                                    [
                                                        'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => trans_choice('content.points_buy_in', 1),
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.points_buy_in'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.points_buy_in') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-span-12 xl:col-span-6">
                                                <label>{{ trans_choice('content.points_buy_us', 1) }}</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[points_buy_us]',
                                                    isset($settings['points_buy_us']) ? $settings['points_buy_us'] : null,
                                                    [
                                                        'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => trans_choice('content.points_buy_us', 1),
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.points_buy_us'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.points_buy_us') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-span-12 xl:col-span-6">
                                                <label>{{ trans_choice('content.points_withdrawal_in', 1) }}</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[points_withdrawal_in]',
                                                    isset($settings['points_withdrawal_in']) ? $settings['points_withdrawal_in'] : null,
                                                    [
                                                        'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => trans_choice('content.points_withdrawal_in', 1),
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.points_withdrawal_in'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.points_withdrawal_in') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-span-12 xl:col-span-6">
                                                <label>{{ trans_choice('content.points_withdrawal_us', 1) }}</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[points_withdrawal_us]',
                                                    isset($settings['points_withdrawal_us']) ? $settings['points_withdrawal_us'] : null,
                                                    [
                                                        'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => trans_choice('content.points_withdrawal_us', 1),
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.points_withdrawal_us'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.points_withdrawal_us') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-span-12 xl:col-span-6">
                                                <label>{{ trans_choice('content.referral_points', 1) }}</label><span class="text-theme-6">*</span>
                                                {!! Form::text(
                                                    'data[referral_points]',
                                                    isset($settings['referral_points']) ? $settings['referral_points'] : null,
                                                    [
                                                        'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                                                        'placeholder' => trans_choice('content.referral_points', 1),
                                                    ],
                                                ) !!}
                                                @if ($errors->has('data.referral_points'))
                                                    <div class="pristine-error text-theme-6 mt-2">
                                                        {{ $errors->first('data.referral_points') }}
                                                    </div>
                                                @endif
                                            </div>
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
