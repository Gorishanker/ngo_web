@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Team</title>
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
                            <h2>team single</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>team</li>
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
    <section class="bg-single-team">
        <div class="container">
            <div class="row">
                <div class="single-team">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-team-img">
                                <img src="{{ $team_detail->image }}"
                                    alt="{{ isset($team_detail->name) ? $team_detail->name : 'Na' }}"
                                    style="width: 636px; height: 588px" class="img-responsive">
                            </div>
                            <!-- .single-team-img -->
                        </div>
                        <!-- .col-md-6 -->
                        <div class="col-md-6">
                            <div class="single-team-details">
                                <h3>{{ isset($team_detail->name) ? $team_detail->name : 'Na' }}</h3>
                                <h5>{{ isset($team_detail->position) ? $team_detail->position : 'Na' }}</h5>
                                <p>{{ isset($team_detail->description) ? $team_detail->description : 'Na' }}</p>
                                <ul class="social-icon-rounded">
                                    @if (isset($team_detail->facebook_url))
                                        <li>
                                            <a href="{{ $team_detail->facebook_url }}" target="_blank"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                    @endif
                                    @if (isset($team_detail->twitter_url))
                                        <li><a href="{{ $team_detail->twitter_url }}" target="_blank"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                    @endif
                                    @if (isset($team_detail->linkedin_url))
                                        <li><a href="{{ $team_detail->linkedin_url }}" target="_blank"><i
                                                    class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </li>
                                    @endif
                                    @if (isset($team_detail->instagram_url))
                                        <li><a href="{{ $team_detail->instagram_url }}" target="_blank"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                                <div class="team-address-box">
                                    <ul class="address">
                                        @if (isset($team_detail->address))
                                        <li>
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>{{$team_detail->address}}</span>
                                        </li>
                                        @endif
                                        @if (isset($team_detail->email))
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span>{{$team_detail->email}}</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- .team-address-box -->


                            </div>
                            <!-- .single-team-content -->
                        </div>
                        <!-- .col-md-6 -->
                    </div>
                    <!-- .row -->
                    @if (isset($team_detail->personal_statement))
                    <div class="single-team-content">
                        <h3>Personal Statement</h3>
                        <p>{{$team_detail->personal_statement}}</p>
                    </div>
                    <!-- .single-team-content -->
                    @endif

                </div>
                <!-- .single-team -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
@endsection
