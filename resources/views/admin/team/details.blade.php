@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.team', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.teams.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.name', 1) }}
                        : </label>
                    {{ isset($team->name) ? $team->name : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.email', 1) }}
                        : </label>
                    {{ isset($team->email) ? $team->email : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.position', 1) }}
                        : </label>
                    {{ isset($team->position) ? $team->position : 'Na' }}
                </div>
            </div>
        </div>
        {{-- <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.address', 1) }}
                        : </label>
                    {{ isset($team->address) ? $team->address : 'Na' }}
                </div>
            </div>
        </div> --}}
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($team->is_active == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </div>
            </div>
        </div>

        @if (isset($team->facebook_url))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.facebook_url', 1) }}
                            : </label>
                        <a href="{{ $team->facebook_url }}" target="_blank"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Open page
                            </button> </a>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($team->linkedin_url))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.linkedin_url', 1) }}
                            : </label>
                        <a href="{{ $team->linkedin_url }}" target="_blank"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Open page
                            </button> </a>
                    </div>
                </div>
            </div>
        @endif

        @if (isset($team->twitter_url))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.twitter_url', 1) }}
                            : </label>
                        <a href="{{ $team->twitter_url }}" target="_blank"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Open page
                            </button> </a>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($team->instagram_url))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.instagram_url', 1) }}
                            : </label>
                        <a href="{{ $team->instagram_url }}" target="_blank"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Open page
                            </button> </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    {{ isset($team->created_at) ? get_default_format($team->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $team->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img src="{{ $team->image }}" alt="{{$team->name}}">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.description', 1) }}
                        : </label>
                    {!! isset($team->description) ? $team->description : 'Na' !!}
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.personal_statement', 1) }}
                        : </label>
                    {!! isset($team->personal_statement) ? $team->personal_statement : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.teams.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
