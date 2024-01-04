@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => trans_choice('content.edit_profile', 1),
        'breadcrumbs' => Breadcrumbs::render('admin.edit-profile'),
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
                            {{ Form::model($data, ['url' => route('admin.update.edit_profile', ['user' => $auth_user->id]), 'method' => 'PATCH', 'files' => true, 'role' => 'form', 'id' => 'adminForm', 'enctype' => 'multipart/form-data']) }}
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <label class="required">{{ trans_choice('content.name_title', 1) }}</label>
                                    {!! Form::text('name', null, [
                                        'placeholder' => 'Name',
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <label class="required">{{ trans_choice('content.phone_title', 1) }}</label>
                                    {!! Form::text('mobile_no', null, [
                                        'placeholder' => 'Mobile No.',
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <label class="required">{{ trans_choice('content.email_title', 1) }}</label>
                                    {!! Form::text('email', null, [
                                        'placeholder' => 'Email',
                                        'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                                    ]) !!}
                                </div>
                                <div class="col-span-12 xl:col-span-5">
                                    <label class="">Image</label>
                                    {!! Form::file('image', [
                                        'class' => 'input w-full border bg-gray-100 mt-2',
                                        'id' => 'image',
                                        'onchange' => 'readURL(this, image);',
                                        'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
                                        'placeholder' => __('Upload Profile Image '),
                                    ]) !!}
                                </div>
                                <div class="col-span-12 xl:col-span-1 mt-4">
                                    @if (isset($auth_user->image))
                                        <img id="backImage_image" height="100px" width="100px"
                                            src="{{ $auth_user->image }}" title="Image">
                                    @else
                                        <img id="backImage_image" height="100px" width="100px" src="{{ blankImageUrl() }}"
                                            title="Image">
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-5 mt-6">
                            </div>
                            <div class="text-right py-6 px-9">
                                <div class="mr-6">
                                    <button type="button" class="button w-16 bg-theme-1 text-white">
                                        <a href="{{ route('admin.dashboard') }}">Back</a>
                                    </button>
                                    <button id="submit_btn" type="submit"
                                        class="button w-24 bg-theme-1 mr-2 text-white">{{ __('content.update_title') }}</button>
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EditProfileRequest', 'form') !!}
@endpush
