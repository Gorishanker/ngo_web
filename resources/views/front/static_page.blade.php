@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Donate</title>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! SEO::generate() !!}
@endsection
@section('content')
    <section class="bg-page-header" style="background:  url({{ asset('front/images/about/bg-page-header.jpg') }}) no-repeat">
        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            @if (request()->is('*terms-and-conditions*'))
                                <h2>Terms & Conditions</h2>
                            @elseif(request()->is('*privacy-policy*'))
                                <h2> Privacy Policy</h2>
                            @elseif(request()->is('*cancellations-policy*'))
                                <h2> Refund/Cancellation Policy</h2>
                            @elseif(request()->is('*shipping-policy*'))
                                <h2>Shipping Policy</h2>
                            @elseif(request()->is('*pricing-policy*'))
                                <h2>Pricing Policy</h2>
                            @else
                                <h2>Page</h2>
                            @endif
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                @if (request()->is('*terms-and-conditions*'))
                                    <li>Terms & Conditions</li>
                                @elseif(request()->is('*privacy-policy*'))
                                    <li> Privacy Policy</li>
                                @elseif(request()->is('*cancellations-policy*'))
                                    <li> Cancellation Policy</li>
                                @elseif(request()->is('*shipping-policy*'))
                                    <li>Shipping Policy</li>
                                @elseif(request()->is('*pricing-policy*'))
                                    <li>Pricing Policy</li>
                                @else
                                    <li>Page</li>
                                @endif
                            </ol>
                        </div>
                        <!-- .page-header-content -->
                    </div>
                    <!-- .page-header -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .page-header-overlay -->
    </section>

    <section class="bg-donate-section">
        <div class="container">
            <div class="row">
                @if (request()->is('*terms-and-conditions*'))
                   {!!getPageContentBySlug('terms-and-conditions')!!}
                @elseif(request()->is('*privacy-policy*'))
                {!!getPageContentBySlug('privacy-policy')!!}
                @elseif(request()->is('*cancellations-policy*'))
                {!!getPageContentBySlug('refunds-cancellations-policy')!!}
                @elseif(request()->is('*shipping-policy*'))
                {!!getPageContentBySlug('shipping-policy')!!}
                @elseif(request()->is('*pricing-policy*'))
                {!!getPageContentBySlug('pricing-policy')!!}
                @else
                   Page Not Found.
                @endif
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
@endsection
