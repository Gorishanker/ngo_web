@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} About us</title>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! SEO::generate() !!}
@endsection
@section('content')
    <!-- Start Page Header Section -->
    <section class="bg-page-header" style="background:  url({{ asset('front/images/about/bg-page-header.jpg') }}) no-repeat">
        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h2>ABOUT US</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>ABOUT US</li>
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
    <!-- End Page Header Section -->


    <!-- Start About Greenforest Section -->
    <section class="bg-about-greenforest">
        <div class="container">
            <div class="row">
                <div class="about-greenforest">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="about-greenforest-content">
                                <h2>about greenforest</h2>
                                <p><span>Globaly eenable turnkey aplcations interndent awesome andbenefisa tional awesome
                                        ascenarios exceptional scenarios awesome theme strategies.</span></p>
                                <p>Globally eenable turnkey applications via interdependent awesome andbenefitsa theme are
                                    awesome Uniquely formulate impacful bandwidth with client centered creative ianitiatives
                                    Interively productivate vertcal paradigms before resource maximg convergence. Efciey
                                    diseminate mtidisciplinary mindshare after clientcentered creative theme experienvertcal
                                    paradigms before resource maximg convergence. Efciey diseminate mindshare clientcentered
                                    creative theme experiences.</p>
                                <a href="#" class="btn btn-default">join now</a>
                                <a href="{{ route('front.donate') }}" class="btn btn-default">donate now</a>
                            </div>
                            <!-- .about-greenforest-content -->
                        </div>
                        <!-- .col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="about-greenforest-img">
                                <img src="{{ asset('front/images/home02/about-greenforet-img.jpg') }}"
                                    alt="about-greenforet-img" class="img-responsive" />
                            </div>
                            <!-- .about-greenforest-img -->
                        </div>
                        <!-- .col-md-4 -->
                    </div>
                </div>
                <!-- .about-greenforest -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- End About Greenforest Section -->


    <!-- Start Count Section -->
    <section class="bg-count2-section">
        <div class="count-overlay">
            <div class="container">
                <div class="row">
                    <div class="count-option">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-internet"></i>
                                    <span class="counter" data-to="25" data-speed="1500"></span><span>+</span>
                                    <h4>GLOBALIZATION WORK</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-man"></i>
                                    <span class="counter" data-to="750" data-speed="1500"></span><span>+</span>
                                    <h4>HAPPY DONATORS</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-rocket-launch"></i>
                                    <span class="counter" data-to="250" data-speed="1500"></span><span>+</span>
                                    <h4>SUCCESS MISSION</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-people"></i>
                                    <span class="counter" data-to="1000" data-speed="1500"></span><span>+</span>
                                    <h4>VOLUNTEER REACHED</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .count-section -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
    </section>
    <!-- End Count Section -->
@if(teams()->count() > 0)
    <!-- Start our volunteers Section -->
    <section class="bg-volunteers-section">
        <div class="container">
            <div class="row">
                <div class="volunteers-option">
                    <div class="section-header">
                        <h2>our volunteers</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    <!-- .section-header -->
                    <div class="row">
                        @foreach (teams() as $team)
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="volunteers-items">
                                    <div class="volunteers-img">
                                        <a href="{{route('front.teamView',$team->slug)}}">
                                        <img style="width: 200px; height: 200px;" src="{{ $team->image }}"
                                            alt="{{ isset($team->name) ? $team->name : 'Na' }}" class="img-responsive" /></a>
                                    </div>
                                    <!-- .volunteers-img -->
                                    <div class="volunteers-content">
                                        <h4><a href="{{route('front.teamView',$team->slug)}}">{{ isset($team->name) ? $team->name : 'Na' }}</a>
                                        </h4>
                                        <p>{{ isset($team->position) ? $team->position : 'Na' }}</p>
                                    </div>
                                    <!-- .volunteers-content -->
                                    <div class="volunteers-social-icon">
                                        <ul class="social-icon">
                                            @if(isset($team->facebook_url))
                                            <li>
                                                <a href="{{$team->facebook_url}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            @endif
                                            @if(isset($team->twitter_url))
                                            <li><a href="{{$team->twitter_url}}" target="_blank"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            @endif
                                            @if(isset($team->linkedin_url))
                                            <li><a href="{{$team->linkedin_url}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                            @endif
                                            @if(isset($team->instagram_url))
                                            <li><a href="{{$team->instagram_url}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- .volunteers-social-icon -->
                                </div>
                                <!-- .volunteers-items -->
                            </div>
                        @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .volume-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @endif
    <!-- End our volunteers Section -->

    {{-- <!-- Start People Say Section -->
    <section class="bg-people-say-section">
        <div class="people-say-overlay">
            <div class="container">
                <div class="row">
                    <div class="people-say-section">
                        <div class="people-say-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="people-say-items">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <p>Somrat Islam <a href="#">@Bonndu007Somrat</a> Feb 18Globally expeyiadite
                                            wireless expertise without progressive imperatives. Intrinsicly embrace holistic
                                            data after ethical from <a href="#"><span>@invisionapp:
                                                    http://bit.ly/1VnL6yL </span></a></p>
                                        <p>02 Days ago</p>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <!-- .swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="people-say-items">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <p>Somrat Islam <a href="#">@Bonndu007Somrat</a> Feb 18Globally expeyiadite
                                            wireless expertise without progressive imperatives. Intrinsicly embrace holistic
                                            data after ethical from <a href="#"><span>@invisionapp:
                                                    http://bit.ly/1VnL6yL </span></a></p>
                                        <p>02 Days ago</p>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <!-- .swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="people-say-items">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <p>Somrat Islam <a href="#">@Bonndu007Somrat</a> Feb 18Globally expeyiadite
                                            wireless expertise without progressive imperatives. Intrinsicly embrace holistic
                                            data after ethical from <a href="#"><span>@invisionapp:
                                                    http://bit.ly/1VnL6yL </span></a></p>
                                        <p>02 Days ago</p>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <!-- .swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="people-say-items">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <p>Somrat Islam <a href="#">@Bonndu007Somrat</a> Feb 18Globally expeyiadite
                                            wireless expertise without progressive imperatives. Intrinsicly embrace holistic
                                            data after ethical from <a href="#"><span>@invisionapp:
                                                    http://bit.ly/1VnL6yL </span></a></p>
                                        <p>02 Days ago</p>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <!-- .swiper-slide -->

                            </div>
                            <!-- .swiper-wrapper -->
                        </div>
                        <!-- .people-say-container -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- .people-say-section -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .people-say-overlay -->
    </section>
    <!-- End People Say Section --> --}}

    <!-- Start Blog Section -->
    @if (isset($blogs) && $blogs->count() > 0)
    <section class="bg-blog-section">
        <div class="container">
            <div class="row">
                <div class="blog-section">
                    <div class="section-header">
                        <h2>From Our Blog</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    <!-- .section-header -->
                    <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="blog-items">
                                        <div class="blog-img">
                                            <a href="{{ route('front.blogView', $blog->slug) }}"><img
                                                    style="width: 416px; height: 303px;" src="{{ $blog->image }}"
                                                    alt="{{ isset($blog->meta_title) ? $blog->meta_title : 'Blog Image' }}"
                                                    class="img-responsive" /></a>
                                        </div>
                                        <!-- .blog-img -->
                                        <div class="blog-content-box">
                                            <div style="word-break: break-all;" class="blog-content">
                                                <h4><a
                                                        href="{{ route('front.blogView', $blog->slug) }}">{{ isset($blog->title) ? $blog->title : 'Na' }}</a>
                                                </h4>
                                                <p>{!! setStringLength($blog->content, 150) !!}</p>
                                            </div>
                                            <!-- .blog-content -->
                                            <div class="meta-box">
                                                <ul class="meta-post">
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ isset($blog->schedule_datetime) ? get_default_format($blog->schedule_datetime) : get_default_format($blog->created_at) }}
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i> 24
                                                            Like</a></li>
                                                    <li><a href="#"><i class="fa fa-commenting-o"
                                                                aria-hidden="true"></i>
                                                            24 Comment</a></li>
                                                </ul>
                                            </div>
                                            <!-- .meta-box -->
                                        </div>
                                        <!-- .blog-content-box -->
                                    </div>
                                    <!-- .blog-items -->
                                </div>
                            @endforeach
                           
                        
                    </div>
                    <!-- .row -->
                </div>
                <!-- .blog-section -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-blog-section -->
    </section>
    @endif
    <!-- End Blog Section -->
    @if(sponsors()->count() > 0)
       <!-- Start Sponsors Section -->
       <section class="bg-sponsors-section">
        <div class="container">
            <div class="row">
                <div class="sponsors-option">
                    <div class="section-header">
                        <h2>top sponsors</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    <!-- .section-header -->
                    <div class="sponsors-container">
                        <div class="swiper-wrapper">
                            @foreach (sponsors() as $sponsor)
                                <div class="swiper-slide">
                                    <div class="sopnsors-items">
                                        <a href="#"><img style="width: 309px; height: 137px"
                                                src="{{ $sponsor->image }}" alt="{{ $sponsor->name }}"
                                                class="img-responsive" /></a>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <!-- .swiper-slide -->
                            @endforeach
                        </div>
                        <!-- .swiper-wrapper -->
                    </div>
                    <!-- .sponsors-container -->
                </div>
                <!-- .sponsors-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @endif
    <!-- End Sponsors Section -->
@endsection
