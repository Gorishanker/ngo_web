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

    @if(getSettingDataBySlug('about_1st_content'))
    <!-- Start About Greenforest Section -->
    <section class="bg-about-greenforest">
        <div class="container">
            <div class="row">
                <div class="about-greenforest">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="about-greenforest-content">
                               {!!getSettingDataBySlug('about_1st_content')!!}
                                <a href="{{getSettingDataBySlug('about_1_btn_url')}}" class="btn btn-default">{{getSettingDataBySlug('about_1_btn_text')}}</a>
                                <a href="{{getSettingDataBySlug('about_2_btn_url')}}" class="btn btn-default">{{getSettingDataBySlug('about_2_btn_text')}}</a>
                            </div>
                            <!-- .about-greenforest-content -->
                        </div>
                        <!-- .col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="about-greenforest-img">
                                <img style="width:424px; height:473px;" src="{{ ($global_setting_data['about_1st_image']) ? asset('files/settings/' . $global_setting_data['about_1st_image'] . '') : $about_1st_image }}"
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
    @else
    <img height="600px" src="{{asset('front/comming_soon.jpg')}}">
@endif

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
                                    <span class="counter" data-to="{{getSettingDataBySlug('total_globalization_work')}}" data-speed="1500"></span><span>+</span>
                                    <h4>GLOBALIZATION WORK</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-man"></i>
                                    <span class="counter" data-to="{{getSettingDataBySlug('total_happy_donator')}}" data-speed="1500"></span><span>+</span>
                                    <h4>HAPPY DONATORS</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-rocket-launch"></i>
                                    <span class="counter" data-to="{{getSettingDataBySlug('total_success_mission')}}" data-speed="1500"></span><span>+</span>
                                    <h4>SUCCESS MISSION</h4>
                                </div>
                                <!-- .count-items -->
                            </div>
                            <!-- .col-lg-3 -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-people"></i>
                                    <span class="counter" data-to="{{getSettingDataBySlug('total_volunteer_reached')}}" data-speed="1500"></span><span>+</span>
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
    @if (teams()->count() > 0)
        <!-- Start our volunteers Section -->
        <section class="bg-volunteers-section">
            <div class="container">
                <div class="row">
                    <div class="volunteers-option">
                        <div class="section-header">
                            <h2>{{getSettingDataBySlug('volunteer_section_heading')}}</h2>
                            <p>{{getSettingDataBySlug('volunteer_section_description')}}</p>
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            @foreach (teams() as $team)
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="volunteers-items">
                                        <div class="volunteers-img">
                                            <a href="{{ route('front.teamView', $team->slug) }}">
                                                <img style="width: 200px; height: 200px;" src="{{ $team->image }}"
                                                    alt="{{ isset($team->name) ? $team->name : 'Na' }}"
                                                    class="img-responsive" /></a>
                                        </div>
                                        <!-- .volunteers-img -->
                                        <div class="volunteers-content">
                                            <h4><a
                                                    href="{{ route('front.teamView', $team->slug) }}">{{ isset($team->name) ? $team->name : 'Na' }}</a>
                                            </h4>
                                            <p>{{ isset($team->position) ? $team->position : 'Na' }}</p>
                                        </div>
                                        <!-- .volunteers-content -->
                                        <div class="volunteers-social-icon">
                                            <ul class="social-icon">
                                                @if (isset($team->facebook_url))
                                                    <li>
                                                        <a href="{{ $team->facebook_url }}" target="_blank"><i
                                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    </li>
                                                @endif
                                                @if (isset($team->twitter_url))
                                                    <li><a href="{{ $team->twitter_url }}" target="_blank"><i
                                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    </li>
                                                @endif
                                                @if (isset($team->linkedin_url))
                                                    <li><a href="{{ $team->linkedin_url }}" target="_blank"><i
                                                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                    </li>
                                                @endif
                                                @if (isset($team->instagram_url))
                                                    <li><a href="{{ $team->instagram_url }}" target="_blank"><i
                                                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
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

    @if (testimonials()->count() > 0)
        <!-- Start People Say Section -->

        <section class="bg-people-say-section">
            <div class="people-say-overlay">
                <div class="container">
                    <div class="row">
                        <div class="people-say-section">
                            <div class="people-say-container">
                                <div class="swiper-wrapper">
                                    @foreach (testimonials() as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="people-say-items">
                                                <img src="{{ $testimonial->image }}"
                                                    style="width: 6rem; border-radius: 5rem;"
                                                    alt="{{ isset($testimonial->name) ? $testimonial->name : 'User Profile' }}">
                                                <h3>{{ isset($testimonial->name) ? $testimonial->name : 'Guset User' }}
                                                </h3>
                                                <h4>{{ isset($testimonial->country) ? '(' . $testimonial->country . ')' : '' }}
                                                </h4>
                                                <p>{{ isset($testimonial->content) ? $testimonial->content : '' }}</p>
                                            </div>
                                            <!-- .sponsors-items -->
                                        </div>
                                    @endforeach
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
        <!-- End People Say Section -->
    @endif

    <!-- Start Blog Section -->
    @if (isset($blogs) && $blogs->count() > 0)
        <section class="bg-blog-section">
            <div class="container">
                <div class="row">
                    <div class="blog-section">
                        <div class="section-header">
                            <h2>{{getSettingDataBySlug('blog_section_heading')}}</h2>
                            <p>{{getSettingDataBySlug('blog_section_description')}}</p>
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
    @if (sponsors()->count() > 0)
        <!-- Start Sponsors Section -->
        <section class="bg-sponsors-section">
            <div class="container">
                <div class="row">
                    <div class="sponsors-option">
                        <div class="section-header">
                            <h2>{{getSettingDataBySlug('sponsor_section_heading')}}</h2>
                            <p>{{getSettingDataBySlug('sponsor_section_heading')}}</p>
                        </div>
                        <!-- .section-header -->
                        <div class="sponsors-container">
                            <div class="swiper-wrapper">
                                @foreach (sponsors() as $sponsor)
                                    <div class="swiper-slide" style="display: flex;">
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
