@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.order', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.orders.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.ip_address', 1) }}
                        : </label>
                    {{ isset($order->ip_address) ? $order->ip_address : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.total_price', 1) }}
                        : </label>
                    {{ isset($order->total_price) ? currencyIcon() . $order->total_price : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.payment_status', 1) }}
                        : </label>
                    {{ isset($order->payment_status) ? paymentStatus($order->payment_status) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.payment_date', 1) }}
                        : </label>
                    {{ isset($order->payment_date) ? get_default_format($order->payment_date) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.status', 1) }}
                        : </label>
                    {{ isset($order->status) ? orderStatus($order->status) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                        : </label>
                    {{ isset($order->created_at) ? get_default_format($order->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.payment_json', 1) }}
                        : </label>
                    {{ isset($order->payment_json) ? $order->payment_json : 'Na' }}
                </div>
            </div>
        </div>
    </div>
    @if (isset($order->orderGift))
        <div class="intro-y flex flex-col sm:flex-row items-center mt-2">
            <h2 class="text-lg font-medium mr-auto mt-3 mb-4">Gift Detail</h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Campaign Name
                            : </label>
                            <a href="{{route('admin.campaigns.show', $order->orderGift->campaign_id)}}" target="_blank">
                            {{ isset($order->orderGift->campaign->title) ? $order->orderGift->campaign->title : 'Na' }}</a>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Name
                            : </label>
                            {{ isset($order->orderGift->name) ? $order->orderGift->name : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Email
                            : </label>
                            {{ isset($order->orderGift->email) ? $order->orderGift->email : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">From
                            : </label>
                            {{ isset($order->orderGift->from) ? $order->orderGift->from : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Title
                            : </label>
                            {{ isset($order->orderGift->title) ? $order->orderGift->title : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Delivery date
                            : </label>
                            {{ isset($order->orderGift->delivery_date) ? get_default_format($order->orderGift->delivery_date) : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Created at
                            : </label>
                            {{ isset($order->orderGift->created_at) ? get_default_format($order->orderGift->created_at) : 'Na' }}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">Message
                            : </label>
                            {{ isset($order->orderGift->message) ? $order->orderGift->message : 'Na' }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.orders.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
@endsection
