@extends('admin.layouts.base')

@section('title')
    <title>{{ __('header.edit_setting') }}</title>
@endsection

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('header.edit_setting'),
        'breadcrumbs' => Breadcrumbs::render(),
    ])
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

            <div class="grid grid-cols-12 gap-5">

                <div class="col-span-12">

                    <div class="box">

                        <div class="p-5">

                            {!! Form::open([
                                'route' => 'admin.settings.update_general',
                                'method' => 'POST',
                                'class' => 'form mb-15',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            @csrf
                            @include('admin.setting.form')
                            <!--begin::Submit-->

                            <div class="text-right mt-6">
                                <div class="mr-6">
                                    <button id="submitBtn" type="submit" class="button bg-theme-1 mr-2 text-white">Update
                                    </button>
                                </div>
                            </div>
                            <!-- end::Submit -->
                            {!! Form::close() !!}
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
