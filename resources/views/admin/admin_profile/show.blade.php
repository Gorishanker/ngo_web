@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        // 'title' => trans_choice('header.profile_details', 1),
        'breadcrumbs' => Breadcrumbs::render('admin.profile'),
    ])
    <div>
        @include('admin.admin_profile.navbar')
    </div>
    <div class="intro-y box col-span-12 lg:col-span-6">

        {{-- <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                {{ trans_choice('content.profile', 1) }}
            </h2>
        </div> --}}
        <div class="p-5">
            <div class="flex flex-col sm:flex-row mt-5" style="display: flex;">
                <div class="col-md-6" style="width: 65%;">
                    <a href="" class="font-medium">Name :</a>
                    <div class="text-gray-600 mt-1">
                        {{ isset($auth_user->name) ? $auth_user->name : 'N/A' }}
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="" class="font-medium">Email ID :</a>
                    <div class="text-gray-600 mt-1">{{ isset($auth_user->email) ? $auth_user->email : 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row mt-5" style="display: flex;">
                <div class="col-md-6" style="width: 65%;">
                    <a href="" class="font-medium">Role :</a>
                    <div class="text-gray-600 mt-1">
                        {{ isset($auth_user->getRoleNames()[0]) ? $auth_user->getRoleNames()[0] : 'N/A' }}
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="" class="font-medium">Mobile No. :</a>
                    <div class="text-gray-600 mt-1">
                        {{ isset($auth_user->mobile_no) ? '+91' . ' ' . $auth_user->mobile_no : 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row mt-5" style="display: flex;">
                <div class="col-md-6" style="width: 65%;">
                    <a href="" class="font-medium">Created At :</a>
                    <div class="text-gray-600 mt-1">
                        {{ isset($auth_user->created_at) ? get_default_format($auth_user->created_at) : __('content.no_data') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="" class="font-medium">Updated At :</a>
                    <div class="text-gray-600 mt-1">
                        {{ isset($auth_user->updated_at) ? get_default_format($auth_user->updated_at) : __('content.no_data') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
