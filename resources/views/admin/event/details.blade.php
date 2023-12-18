@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.event', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.events.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                        : </label>
                    {{ isset($event->title) ? $event->title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.meta_title', 1) }}
                        : </label>
                    {{ isset($event->meta_title) ? $event->meta_title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.category', 1) }}
                        : </label>
                    {{ isset($event->category->category_name) ? $event->category->category_name : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.author', 1) }}
                        : </label>
                    {{ isset($event->author) ? $event->author : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($event->is_active == 1)
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
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.address', 1) }}
                        : </label>
                    {{ isset($event->address) ? $event->address : 'Na' }}
                </div>
            </div>
        </div>
        @if (isset($event->date))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.date', 1) }}
                            : </label>
                        {{ get_default_format($event->date) }}
                    </div>
                </div>
            </div>
        @endif
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                        : </label>
                    {{ isset($event->created_at) ? get_default_format($event->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $event->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img src="{{ $event->image }}" alt="Banner image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.meta_description', 1) }}
                        : </label>
                    {{ isset($event->meta_description) ? $event->meta_description : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.content', 1) }}
                        : </label>
                    {{ isset($event->content) ? $event->content : 'Na' }}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.events.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
