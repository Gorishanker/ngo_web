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
                                // 'onsubmit' => 'return checkForm(this);',
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
                                            <label class="required">Site Mode</label>
                                            {!! Form::select(
                                                'data[site_mode]',
                                                [0 => 'Devleopment', 1 => 'Live'],
                                                isset($settings['site_mode']) ? $settings['site_mode'] : null,
                                                [
                                                    'placeholder' => trans_choice('content.please_select', 1),
                                                    'class' => 'input w-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
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
                                            <label class="required">Whatsapp number</label>
                                            {!! Form::text(
                                                'data[whatsapp_number]',
                                                isset($settings['whatsapp_number']) ? $settings['whatsapp_number'] : null,
                                                [
                                                    'placeholder' => 'Whatsapp number',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Address</label>
                                            {!! Form::text('data[address]', isset($settings['address']) ? $settings['address'] : null, [
                                                'placeholder' => 'Address',
                                                'class' => 'input w-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Time</label>
                                            {!! Form::text('data[available_time]', isset($settings['available_time']) ? $settings['available_time'] : null, [
                                                'placeholder' => 'Time',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Letest campaign video url</label>
                                            {!! Form::text(
                                                'data[letest_campaign_video_url]',
                                                isset($settings['letest_campaign_video_url']) ? $settings['letest_campaign_video_url'] : null,
                                                [
                                                    'placeholder' => 'Letest campaign video url',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="">Twitter url</label>
                                            {!! Form::text('data[twitter_url]', isset($settings['twitter_url']) ? $settings['twitter_url'] : null, [
                                                'placeholder' => 'Twitter url',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="">Facebook url</label>
                                            {!! Form::text('data[facebook_url]', isset($settings['facebook_url']) ? $settings['facebook_url'] : null, [
                                                'placeholder' => 'Facebook url',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="">Instagram url</label>
                                            {!! Form::text('data[instagram_url]', isset($settings['instagram_url']) ? $settings['instagram_url'] : null, [
                                                'placeholder' => 'Instagram url',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>

                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="">Linkedin url</label>
                                            {!! Form::text('data[linkedin_url]', isset($settings['linkedin_url']) ? $settings['linkedin_url'] : null, [
                                                'placeholder' => 'Linkedin url',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>


                                        <div class="col-span-12 xl:col-span-12">
                                            <label class="required">About us</label>
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

                                        <div class="col-span-12 xl:col-span-12">
                                            <label class="required">Contact us (For footer)</label>
                                            {!! Form::textarea(
                                                'data[contact_us_text]',
                                                isset($settings['contact_us_text']) ? $settings['contact_us_text'] : null,
                                                [
                                                    'placeholder' => 'Contact us',
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
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Bank Details
                                        </h2>
                                    </div>
                                    <div class="grid grid-cols-12 gap-5 mt-5">
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Bank Name</label>
                                            {!! Form::text('data[bank_name]', isset($settings['bank_name']) ? $settings['bank_name'] : null, [
                                                'placeholder' => 'Bank Name',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">A/C Number</label>
                                            {!! Form::text('data[ac_number]', isset($settings['ac_number']) ? $settings['ac_number'] : null, [
                                                'placeholder' => 'A/C Number',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">IFSC Code</label>
                                            {!! Form::text('data[ifsc_code]', isset($settings['ifsc_code']) ? $settings['ifsc_code'] : null, [
                                                'placeholder' => 'IFSC Code',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">A/C Name</label>
                                            {!! Form::text('data[ac_name]', isset($settings['ac_name']) ? $settings['ac_name'] : null, [
                                                'placeholder' => 'A/C Name',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Branch</label>
                                            {!! Form::text('data[branch]', isset($settings['branch']) ? $settings['branch'] : null, [
                                                'placeholder' => 'Branch',
                                                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                            ]) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-4">
                                            <label class="required">QR/Scanner</label>
                                            {!! Form::file('data[qr_scanner]', [
                                                'class' => 'input w-full border bg-gray-100 mt-2',
                                                'id' => 'qr_scanner',
                                                'onchange' => 'readURL(this, qr_scanner);',
                                                'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
                                            ]) !!}

                                        </div>
                                        <div class="col-span-12 xl:col-span-2 mt-4">
                                            @if (isset($qr_scanner))
                                                <img id="backImage_qr_scanner" height="100px" width="100px"
                                                    src="{{ $qr_scanner }}" title="Image">
                                            @else
                                                <img id="backImage_qr_scanner" height="100px" width="100px"
                                                    src="{{ blankImageUrl() }}" title="Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="box mt-5 p-5">
                                    <div class="intro-y flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            About us page setting
                                        </h2>
                                    </div>
                                    <div class="grid grid-cols-12 gap-5 mt-5">
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Button 1st text</label>
                                            {!! Form::text(
                                                'data[about_1_btn_text]',
                                                isset($settings['about_1_btn_text']) ? $settings['about_1_btn_text'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Button 1st url</label>
                                            {!! Form::text(
                                                'data[about_1_btn_url]',
                                                isset($settings['about_1_btn_url']) ? $settings['about_1_btn_url'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Button 2nd text</label>
                                            {!! Form::text(
                                                'data[about_2_btn_text]',
                                                isset($settings['about_2_btn_text']) ? $settings['about_2_btn_text'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Button 2nd url</label>
                                            {!! Form::text(
                                                'data[about_2_btn_url]',
                                                isset($settings['about_2_btn_url']) ? $settings['about_2_btn_url'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Total Globalization Work</label>
                                            {!! Form::text(
                                                'data[total_globalization_work]',
                                                isset($settings['total_globalization_work']) ? $settings['total_globalization_work'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Total Happy Donators</label>
                                            {!! Form::text(
                                                'data[total_happy_donator]',
                                                isset($settings['total_happy_donator']) ? $settings['total_happy_donator'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Total Success Missions</label>
                                            {!! Form::text(
                                                'data[total_success_mission]',
                                                isset($settings['total_success_mission']) ? $settings['total_success_mission'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Total Volunteer Reached</label>
                                            {!! Form::text(
                                                'data[total_volunteer_reached]',
                                                isset($settings['total_volunteer_reached']) ? $settings['total_volunteer_reached'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Volunteer Section Heading</label>
                                            {!! Form::text(
                                                'data[volunteer_section_heading]',
                                                isset($settings['volunteer_section_heading']) ? $settings['volunteer_section_heading'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Volunteer Section Description</label>
                                            {!! Form::text(
                                                'data[volunteer_section_description]',
                                                isset($settings['volunteer_section_description']) ? $settings['volunteer_section_description'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Blog Section Heading</label>
                                            {!! Form::text(
                                                'data[blog_section_heading]',
                                                isset($settings['blog_section_heading']) ? $settings['blog_section_heading'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Blog Section Description</label>
                                            {!! Form::text(
                                                'data[blog_section_description]',
                                                isset($settings['blog_section_description']) ? $settings['blog_section_description'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Sponsor Section Heading</label>
                                            {!! Form::text(
                                                'data[sponsor_section_heading]',
                                                isset($settings['sponsor_section_heading']) ? $settings['sponsor_section_heading'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <label class="required">Sponsor Section Description</label>
                                            {!! Form::text(
                                                'data[sponsor_section_description]',
                                                isset($settings['sponsor_section_description']) ? $settings['sponsor_section_description'] : null,
                                                [
                                                    'placeholder' => 'Please Enter',
                                                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
                                            @if ($errors->has('sponsor_section_description'))
                                            <span class="invalid-feedback" style="display: block;">{{ $errors->first('sponsor_section_description') }}</span>
                                        @endif
                                        </div>
                                        @php
                                            $image_1st = isset($settings['about_1st_image']) ? $settings['about_1st_image'] : null;
                                            if (isset($image_1st)) {
                                                $img_1st = asset('files/settings/' . $settings['about_1st_image'] . '');
                                            } else {
                                                $img_1st =blankImageUrl();
                                            }
                                        @endphp

                                        <div class="col-span-12 xl:col-span-4">
                                            <label class="required">1st Section Image</label>
                                            {!! Form::file('data[about_1st_image]', [
                                                'class' => 'input w-full border bg-gray-100 mt-2',
                                                'id' => 'about_1st_image',
                                                'onchange' => 'readURL(this, about_1st_image);',
                                                'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
                                            ]) !!}

                                        </div>
                                        <div class="col-span-12 xl:col-span-2 mt-4">
                                            @if (isset($img_1st))
                                                <img id="backImage_image" height="100px" width="100px"
                                                    src="{{ $img_1st }}" title="Image">
                                            @else
                                                <img id="backImage_image" height="100px" width="100px"
                                                    src="{{ blankImageUrl() }}" title="Image">
                                            @endif
                                        </div>
                                        <div class="col-span-12 xl:col-span-12">
                                            <label class="required">Content</label>
                                            {!! Form::textarea(
                                                'data[about_1st_content]',
                                                isset($settings['about_1st_content']) ? $settings['about_1st_content'] : null,
                                                [
                                                    'placeholder' => 'Content',
                                                    'rows' => 3,
                                                    'class' => 'input summernote w-full border bg-gray-100 mt-2',
                                                ],
                                            ) !!}
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
