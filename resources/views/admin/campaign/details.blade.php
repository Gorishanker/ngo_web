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
                    {{ isset($campaign->target_amount) ? currencyIcon() . $campaign->target_amount : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.raise_amount', 1) }}
                        : </label>
                    {{ isset($campaign->raise_amount) ? currencyIcon() . $campaign->raise_amount : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Total rating
                        : </label>
                    {{ isset($campaign->total_rating) ? $campaign->total_rating . ' Star' : 'Na' }}
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Average rating
                        : </label>
                    {{ isset($campaign->average_rating) ? $campaign->average_rating . ' Star' : 'Na' }}
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
        @if (isset($campaign->campaign_combos) && $campaign->campaign_combos->count())
            @foreach ($campaign->campaign_combos as $combo)
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="intro-y box p-5">
                        <div>
                            <label
                                class="text-gray-500 font-medium leading-none mt-3">Combo name
                                : </label>
                            {{ isset($combo->name) ? $combo->name : 'Na' }}
                        </div>
                    </div>
                </div>
                <div class="intro-y col-span-12 lg:col-span-6">
                    <div class="intro-y box p-5">
                        <div>
                            <label
                                class="text-gray-500 font-medium leading-none mt-3">Combo price
                                : </label>
                            {{ isset($combo->price) ? currencyIcon().$combo->price : 'Na' }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $campaign->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img style="width: 60px; height: 40px;" src="{{ $campaign->image }}" alt="Banner image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Hint
                        : </label>
                    {!! isset($campaign->hint) ? $campaign->hint : 'Na' !!}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Benefit
                        : </label>
                    {!! isset($campaign->benefit) ? $campaign->benefit : 'Na' !!}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Short description
                        : </label>
                    {!! isset($campaign->short_description) ? $campaign->short_description : 'Na' !!}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Primary description
                        : </label>
                    {!! isset($campaign->primary_description) ? $campaign->primary_description : 'Na' !!}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">Secondary description
                        : </label>
                    {!! isset($campaign->secondary_description) ? $campaign->secondary_description : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.campaigns.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
