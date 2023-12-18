@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.project', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.projects.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($project->is_active == 1)
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
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                        : </label>
                    {{ isset($project->created_at) ? get_default_format($project->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.content', 1) }}
                        : </label>
                    {!! isset($project->content) ? $project->content : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{route('admin.projects.index')}}">
            <button type="button"
                class="button mr-2 bg-theme-1 text-white">
                Back</button></a>
        </div>
    </div>
@endsection
