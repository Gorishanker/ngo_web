@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }}</title>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! SEO::generate() !!}
@endsection
@section('content')

<section class="bg-page-header" style="background:  url({{asset('front/images/about/bg-page-header.jpg')}}) no-repeat">
        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h2>our services</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>services</li>
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

    <!-- Start Service Style2 Section -->
    <section class="bg-servicesstyle2-section">
        <div class="container">
            <div class="row">
                <div class="our-services-option">
                    <div class="section-header">
                        <h2>what we do</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    <!-- .section-header -->
                    <div class="row">
                        @if (isset($services) && $services->count() > 0)
                            @foreach ($services as $service)
                                <!-- .col-md-4 -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="our-services-box">
                                        <div class="our-services-items">
                                            <img src="{{ isset($service->image) ? $service->image : null }}"
                                                alt="{{ isset($service->title) ? $service->title : 'Na' }}">
                                            <div class="our-services-content">
                                                <h4><a
                                                        href="{{ route('front.serviceView', $service->slug) }}">{{ isset($service->title) ? $service->title : 'Na' }}</a>
                                                </h4>
                                                <p>{{ setStringLength(strip_tags($service->content), 70) }}</p>
                                                <a href="{{ route('front.serviceView', $service->slug) }}">read more<i
                                                        class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                            </div>
                                            <!-- .our-services-content -->
                                        </div>
                                        <!-- .our-services-items -->
                                    </div>
                                    <!-- .our-services-box -->
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-greenhouse"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Young Planting</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-technology"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Solar Panels</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-light-bulb"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Wind Energy</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-recycling-symbol"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Recycling</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-sprout"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Saving Forests</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-droplet"></i>
                                        <div class="our-services-content">
                                            <h4><a href="service_single.html">Water Refining</a></h4>
                                            <p>Credibly utcost efective an expertise and web enabled proces that
                                                improvements
                                                Completely seamless channels </p>
                                            <a href="service_single.html">read more<i class="fa fa-angle-double-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                        @endif
                    </div>
                    <!-- .row -->
                </div>
                <!-- .our-services-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- End Service Style2 Section -->
    <!-- Start campaian video Section -->
    <section class="bg-compaian-video">
        <div class="compaian-video-overlay">
            <div class="container">
                <div class="row">
                    <div class="compaian-video">
                        <a href="{{ getSettingDataBySlug('letest_campaign_video_url') }}"
                            data-rel="lightcase:myCollection"><img src="{{ asset('front/images/services/video-icon.png') }}"
                                alt="video-icon" /></a>
                        <h3>WATCH OUR LATEST CAMPAIGN VIDEO</h3>
                    </div>
                    <!-- .compaian-video -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .compaian-video-overlay -->
    </section>
    <!-- End campaian video Section -->
    <!-- Start Recent Project Section -->
    <section class="bg-recent-project">
        <div class="container">
            <div class="row">
                <div class="recent-project">
                    <div class="section-header">
                        <h2>recent project</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    <!-- .section-header -->

                    <div id="filters" class="button-group ">
                        <button id="showAllProjects" class="button is-checked">show all</button>
                        @if (isset($categories) && $categories->count() > 0)
                            @foreach ($categories as $key => $category)
                                <button data-id="{{ $category->id }}"
                                    class="single_category_projects button">{{ isset($category->category_name) ? $category->category_name : 'Na' }}</button>
                            @endforeach
                        @endif
                    </div>
                    <div class="category_wise_projects portfolio-items">
                        <div class="item cat-1" data-category="transition">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-1.jpg') }}"
                                        alt="recent-project-img-1">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-1.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Sustainable Agriculture</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <div class="item cat-2 " data-category="metalloid">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-2.jpg') }}"
                                        alt="recent-project-img-2">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-2.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Helping Young Planting</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <!-- .items -->

                        <div class="item cat-3 " data-category="post-transition">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-3.jpg') }}"
                                        alt="recent-project-img-3">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-3.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Need Solar Panels</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <!-- .items -->

                        <div class="item cat-2" data-category="post-transition">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-4.jpg') }}"
                                        alt="recent-project-img-4">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-4.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Save The Ozone Layer</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <!-- .items -->
                        <div class="item cat-4" data-category="transition">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-5.jpg') }}"
                                        alt="recent-project-img-5">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-5.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Save Water From Polution</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <!-- .items -->
                        <div class="item cat-1" data-category="alkali">
                            <div class="item-inner">
                                <div class="portfolio-img">
                                    <div class="overlay-project"></div>
                                    <!-- .overlay-project -->
                                    <img src="{{ asset('front/images/home02/recent-project-img-6.jpg') }}"
                                        alt="recent-project-img-6">
                                    <ul class="project-link-option">
                                        <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="project-search"><a href="front/images/home02/recent-project-img-6.jpg"
                                                data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /.portfolio-img -->
                                <div class="recent-project-content">
                                    <h4><a href="project_single.html">Make Plants Alive</a></h4>
                                    <p>By : <span><a href="#">Green Forest</a></span></p>
                                </div>
                                <!-- .latest-port-content -->
                            </div>
                            <!-- .item-inner -->
                        </div>
                        <!-- .items -->
                    </div>
                    <!-- .isotope-items -->
                </div>
                <!-- .recent-project -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- End Recent Project Section -->
    @push('scripts')
        <script>
            $(document).ready(function() {
                var url = `{{ url('/') }}/get-projects`;
                getLandingPageContent(url);
            });

            $('.single_category_projects').click(function() {
                var id = $(this).attr('data-id');
                var url = `{{ url('/') }}/get-projects/` + id;
                getLandingPageContent(url);
                $('#showAllProjects').removeClass('is-checked');
                $(this).addClass('is-checked');
            });

            $('#showAllProjects').click(function() {
                var url = `{{ url('/') }}/get-projects`;
                getLandingPageContent(url);
                $('.single_category_projects').removeClass('is-checked');
                $(this).addClass('is-checked');
            });

            function getLandingPageContent(url) {
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                    })
                    .done(function(response) {
                        $('.category_wise_projects').html(response.html);
                    });
            }
        </script>
    @endpush
@endsection
