@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.campaign', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.campaigns.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                        : </label>
                    {{ isset($campaign->title) ? $campaign->title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.target_amount', 1) }}
                        : </label>
                    {{ isset($campaign->target_amount) ? currencyIcon(). $campaign->target_amount : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.target_amount', 1) }}
                        : </label>
                    {{ isset($campaign->target_amount) ?currencyIcon(). $campaign->target_amount : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($campaign->is_active == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                        {{ isset($campaign->created_at) ? get_default_format($campaign->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $campaign->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img src="{{ $campaign->image }}" alt="Banner image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.content', 1) }}
                        : </label>
                    {!! isset($campaign->content) ? $campaign->content : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.blogs.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
