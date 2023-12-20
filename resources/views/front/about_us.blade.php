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
    <section class="bg-page-header" style="background:  url({{asset('front/images/about/bg-page-header.jpg')}}) no-repeat">
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
                                <a href="donate.html" class="btn btn-default">donate now</a>
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
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="volunteers-items">
                                <div class="volunteers-img">
                                    <img src="{{ asset('front/images/home01/volunteers-img-1.jpg') }}"
                                        alt="volunteers-img-1" class="img-responsive" />
                                </div>
                                <!-- .volunteers-img -->
                                <div class="volunteers-content">
                                    <h4><a href="team_single.html">robot smith</a></h4>
                                    <p>Founder & CEO</p>
                                </div>
                                <!-- .volunteers-content -->
                                <div class="volunteers-social-icon">
                                    <ul class="social-icon">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- .volunteers-social-icon -->
                            </div>
                            <!-- .volunteers-items -->
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="volunteers-items">
                                <div class="volunteers-img">
                                    <img src="{{ asset('front/images/home01/volunteers-img-2.jpg') }}"
                                        alt="volunteers-img-1" class="img-responsive" />
                                </div>
                                <!-- .volunteers-img -->
                                <div class="volunteers-content">
                                    <h4><a href="team_single.html">JANATON DOE</a></h4>
                                    <p>Founder & CEO</p>
                                </div>
                                <!-- .volunteers-content -->
                                <div class="volunteers-social-icon">
                                    <ul class="social-icon">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- .volunteers-social-icon -->
                            </div>
                            <!-- .volunteers-items -->
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="volunteers-items">
                                <div class="volunteers-img">
                                    <img src="{{ asset('front/images/home01/volunteers-img-3.jpg') }}"
                                        alt="volunteers-img-3" class="img-responsive" />
                                </div>
                                <!-- .volunteers-img -->
                                <div class="volunteers-content">
                                    <h4><a href="team_single.html">SMITH JHONSON</a></h4>
                                    <p>Founder & CEO</p>
                                </div>
                                <!-- .volunteers-content -->
                                <div class="volunteers-social-icon">
                                    <ul class="social-icon">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- .volunteers-social-icon -->
                            </div>
                            <!-- .volunteers-items -->
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="volunteers-items">
                                <div class="volunteers-img">
                                    <img src="{{ asset('front/images/home01/volunteers-img-2.jpg') }}"
                                        alt="volunteers-img-1" class="img-responsive" />
                                </div>
                                <!-- .volunteers-img -->
                                <div class="volunteers-content">
                                    <h4><a href="team_single.html">JHON SHOW</a></h4>
                                    <p>Founder & CEO</p>
                                </div>
                                <!-- .volunteers-content -->
                                <div class="volunteers-social-icon">
                                    <ul class="social-icon">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- .volunteers-social-icon -->
                            </div>
                            <!-- .volunteers-items -->
                        </div>
                        <!-- .col-lg-3 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .volume-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- End our volunteers Section -->

    <!-- Start People Say Section -->
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
    <!-- End People Say Section -->

    <!-- Start Blog Section -->
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
                        @if (isset($blogs) && $blogs->count() > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="blog-items">
                                        <div class="blog-img">
                                            <a href="blog_single.html"><img src="{{$blog->image}}"
                                                    alt="{{isset($blog->meta_title) ? $blog->meta_title : 'Blog Image'}}" class="img-responsive" /></a>
                                        </div>
                                        <!-- .blog-img -->
                                        <div class="blog-content-box">
                                            <div style="word-break: break-all;" class="blog-content">
                                                <h4><a href="blog_single.html">{{isset($blog->title) ? $blog->title : 'Na'}}</a></h4>
                                                <p>{!! setStringLength($blog->content, 150) !!}</p>
                                            </div>
                                            <!-- .blog-content -->
                                            <div class="meta-box">
                                                <ul class="meta-post">
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{isset($blog->schedule_datetime) ? $blog->schedule_datetime : get_default_format($blog->created_at)}}</li>
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
                        @else
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="blog_single.html"><img src="assets/images/about/blog-img-1.jpg"
                                                alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4><a href="blog_single.html">Actualze Cententrc Staled</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and
                                                base
                                                awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                        <div class="meta-box">
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> 22.04.2017</li>
                                                <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 24
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
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="blog_single.html"><img src="assets/images/about/blog-img-2.jpg"
                                                alt="blog-img-2" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4><a href="blog_single.html">Actualze Cententrc Staled</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and
                                                base
                                                awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                        <div class="meta-box">
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> 22.04.2017</li>
                                                <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 24
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
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="blog_single.html"><img src="assets/images/about/blog-img-3.jpg"
                                                alt="blog-img-3" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4><a href="blog_single.html">Actualze Cententrc Staled</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and
                                                base
                                                awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                        <div class="meta-box">
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> 22.04.2017</li>
                                                <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 24
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
                            <!-- .col-md-4 -->
                        @endif
                    </div>
                    <!-- .row -->
                </div>
                <!-- .blog-section -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-blog-section -->
    </section>
    <!-- End Blog Section -->
@endsection
