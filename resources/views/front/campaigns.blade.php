@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Campaigns</title>
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
                            <h2>ALL CAMPAIGN</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>blog</li>
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
    <section class="bg-campaing-section">
        <div class="container">
            <div class="row">
                <div class="focus-cause">
                    <div class="row">
                        @foreach ($campaigns as $campaign)
                            @php
                                $raised_percent = ($campaign->raise_amount / $campaign->target_amount) * 100;
                            @endphp
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="cause-items">
                                    <a href="campaign_single.html"><img
                                            src="{{ isset($campaign->image) ? $campaign->image : null }}" alt="cause-img-1"
                                            class="img-responsive" /></a>
                                    <div class="cause-content">
                                        <div class="price-title">
                                            <div class="price-left">
                                                <h5>Target:<span>{{ isset($campaign->target_amount) ? currencyIcon() . $campaign->target_amount : 0 }}</span>
                                                </h5>
                                            </div>
                                            <!-- .price-left -->
                                            <div class="price-right">
                                                <h5>Raised:<span>{{ isset($campaign->raise_amount) ? currencyIcon() . $campaign->raise_amount : 0 }}</span>
                                                </h5>
                                            </div>
                                            <!-- .price-left -->
                                        </div>
                                        <!-- .price-title -->
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped"
                                                role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width:{{ $raised_percent }}%">
                                            </div>
                                            <!-- .progress-bar -->
                                        </div>
                                        <!-- .progress -->
                                        <h4><a
                                                href="campaign_single.html">{{ isset($campaign->title) ? $campaign->title : null }}</a>
                                        </h4>
                                        <p>{!! setStringLength(strip_tags($campaign->content), 70) !!}</p>
                                        <a href="donate.html" class="btn btn-default">donate Now</a>
                                    </div>
                                    <!-- .cause-content -->
                                </div>
                                <!-- .cause-items -->
                            </div>
                        @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .focus-cause -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
@endsection
