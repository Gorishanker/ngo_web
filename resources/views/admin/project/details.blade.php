@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.project', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.projects.show'),
    ])
    @php
        $pdf_url = null;
        $doc_url = null;
        if (isset($project->project_docs)) {
            if ($project->project_docs->count() > 0) {
                foreach ($project->project_docs as $doc) {
                    if ($doc->type == 1) {
                        $pdf_url = $doc->file;
                    } elseif ($doc->type == 2) {
                        $doc_url = $doc->file;
                    }
                }
            }
        }
    @endphp
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                        : </label>
                    {{ isset($project->title) ? $project->title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.category', 1) }}
                        : </label>
                    {{ isset($project->category->category_name) ? $project->category->category_name : 'Na' }}
                </div>
            </div>
        </div>
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
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.brochure_doc', 1) }}
                        : </label>
                    @if (isset($doc_url))
                        <a href="{{ $doc_url }}" target="_blank">
                            <button type="button"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View
                                file</button>
                        </a>
                    @else
                        Na
                    @endif
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.brochure_pdf', 1) }}
                        : </label>
                    @if (isset($pdf_url))
                        <a href="{{ $pdf_url }}" target="_blank">
                            <button type="button"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View
                                file</button>
                        </a>
                    @else
                        Na
                    @endif
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $project->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img style="width: 100px; height: 70px;" src="{{ $project->image }}" alt="Banner image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.side_images', 1) }}
                        : </label>
                    @if (!empty($project->project_docs))
                        <div style="display: flex;">
                            @foreach ($project->project_docs as $project_doc)
                                @if ($project_doc->type == 3)
                                    <a href="{{ $project_doc->file }}" target="_blank">
                                        <a href="{{ $project_doc->file }}" target="_blank">
                                            <img style="width: 100px; height: 70px; margin: 5px;" src="{{ $project_doc->file }}"
                                                alt="Banner image">
                                        </a>
                                    @else
                                        @continue
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
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
            <a href="{{ route('admin.projects.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
