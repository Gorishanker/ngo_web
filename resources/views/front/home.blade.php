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
    <!-- Start Slider Section -->
    <section class="bg-slider-option">
        <div class="slider-option slider-two">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if (isset($banners) && $banners->count() > 0)
                        @foreach ($banners as $key => $banner)
                            @php
                                $active = '';
                                if ($key == 0) {
                                    $active = 'active';
                                }
                            @endphp
                            <div class="carousel-item {{ $active }}">
                                <div class="slider-item">
                                    <img style="width: 1862px; height: 776px;"
                                        src="{{ isset($banner->image) ? $banner->image : asset('front/images/home02/slider-img-1.jpg') }}"
                                        alt="Slider Image">
                                    <div class="slider-content-area">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <div class="slider-content">
                                                        {!! isset($banner->content)
                                                            ? $banner->content
                                                            : '<h3>welcome to green forest</h3><h2>save the world</h2><p>By Planting Tree Tomorrow!</p>' !!}
                                                        <div class="slider-btn">
                                                            <a href="{{ isset($banner->button_1_url) ? $banner->button_1_url : '#' }}"
                                                                class="btn btn-default">{{ isset($banner->button_1_text) ? $banner->button_1_text : 'join now' }}</a>
                                                            <a href="{{ isset($banner->button_2_url) ? $banner->button_2_url : route('front.donate') }}"
                                                                class="btn btn-default">{{ isset($banner->button_2_text) ? $banner->button_2_text : 'donate now' }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="slider-item">
                                <img src="{{ asset('front/images/home02/slider-img-1.jpg') }}" alt="bg-slider-2">
                                <div class="slider-content-area">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="slider-content">
                                                    <h3>welcome to green forest</h3>
                                                    <h2>save the world</h2>
                                                    <p>By Planting Tree Tomorrow!</p>
                                                    <div class="slider-btn">
                                                        <a href="#" class="btn btn-default">join now</a>
                                                        <a href="#" class="btn btn-default">donate now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button class="left carousel-control carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="right carousel-control carousel-control-next" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End Slider Section -->


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
                                <a href="{{-- route('front.donate') --}}" class="btn btn-default">donate now</a>
                            </div>
                            <!-- .about-greenforest-content -->
                        </div>
                        <!-- .col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="about-greenforest-img">
                                <img style="width: 424px; height: 473px;"
                                    src="{{ asset('front/images/home02/about-greenforet-img.jpg') }}"
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
                        @if (isset($categories) && $categories->count() > 0)
                        <button id="showAllProjects" class="button is-checked">show all</button>
                            @foreach ($categories as $key => $category)
                                <button data-id="{{ $category->id }}"
                                    class="single_category_projects button">{{ isset($category->category_name) ? $category->category_name : 'Na' }}</button>
                            @endforeach
                            @else
                           <img src="{{asset('front/comming_soon.jpg')}}">
                        @endif
                    </div>
                    <div class="category_wise_projects portfolio-items">
                              
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
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-man"></i>
                                    <span class="counter" data-to="750" data-speed="1500"></span><span>+</span>
                                    <h4>HAPPY DONATORS</h4>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-rocket-launch"></i>
                                    <span class="counter" data-to="250" data-speed="1500"></span>
                                    <h4>SUCCESS MISSION</h4>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="count-items">
                                    <i class="flaticon-people"></i>
                                    <span class="counter" data-to="1000" data-speed="1500"></span>
                                    <h4>VOLUNTEER REACHED</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Count Section -->



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
                                            <img style="width: 150px; height: 100px;"
                                                src="{{ isset($service->image) ? $service->image : null }}"
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
                        <div class="section-header">
                            <img src="{{asset('front/comming_soon.jpg')}}">
                        </div>
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


    <!-- Start Focus Cause Section -->
    <section class="bg-focus-cause-section2">
        <div class="container">
            <div class="row">
                <div class="focus-cause">
                    <div class="section-header">
                        <h2>Focused Causes</h2>
                        <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver
                            ubiquitous leadership awesome skills.</p>
                    </div>
                    @if($campaigns->count() > 0)
                    <div class="row">
                        @foreach ($campaigns as $campaign)
                            @php
                                $raised_percent = ($campaign->raise_amount / $campaign->target_amount) * 100;
                            @endphp
                            <div class="col-md-3 col-xl-3 col-sm-6 col-12 col-lg-3">
                                <div class="list-box">
                                    <div class="img-box">
                                        <a href="{{ route('front.campaign.show', $campaign->slug) }}">
                                        <img src="{{ $campaign->image }}"
                                            alt="{{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}"
                                            style="width:304px; height:228px;">
                                        </a>
                                    </div>

                                    <div class="details-box">
                                        <div class="progress-tp-head">
                                            <div class="bar-value">
                                                <span>Total Price:
                                                    <b>{{ currencyIcon() }}{{ $campaign->target_amount }}</b></span>
                                                <span>Raised:
                                                    <b>{{ currencyIcon() }}{{ $campaign->raise_amount }}</b></span>
                                            </div>
                                            <div class="progress skill-bar ">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $raised_percent }}%;">

                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            <a href="{{ route('front.campaign.show', $campaign->slug) }}">
                                                {{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}
                                            </a>
                                        </h6>

                                        <div class="with-cart">
                                            <p class="mb-0" id="cart_total_amount{{ $campaign->id }}"
                                                data-value="{{ $campaign->campaign_combos[0]->price }}">Amount
                                                {{ currencyIcon() }}{{ isset($campaign->order_item->total_amount) ? round($campaign->order_item->total_amount) : $campaign->campaign_combos[0]->price }}</span>
                                            </p>
                                            <div class="number addToCartBTNDiv{{ $campaign->id }}">
                                                @if (isset($campaign->order_item->quantity))
                                                    <span data-id="{{ $campaign->id }}"
                                                        class="minus cart_decrement">-</span>
                                                    <input type="text" data-id="{{ $campaign->id }}"
                                                        class="only_number cartOrderQtyValue"
                                                        id="cart_input{{ $campaign->id }}"
                                                        value="{{ isset($campaign->order_item->quantity) ? $campaign->order_item->quantity : 1 }}">
                                                    <span data-id="{{ $campaign->id }}"
                                                        class="plus cart_increment">+</span>
                                                @else
                                                    <p class="addToCartBTN" data-id="{{ $campaign->id }}"
                                                        style="background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px;border-radius: 5px; cursor: pointer;">
                                                        Add</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="cart-btn">
                                            <span>
                                                @for ($i = 1; $i <= $campaign->average_rating; $i++)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor
                                                @php
                                                    $blank_star = 5 - $campaign->average_rating;
                                                @endphp
                                                @for ($i = 1; $i <= $blank_star; $i++)
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @endfor
                                                ({{ $campaign->total_rating }})
                                            </span>
                                            <a href="{{ route('front.donate') }}" data-id="{{ $campaign->id }}">Donate
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                    <img src="{{asset('front/comming_soon.jpg')}}">
                    @endif
                </div>
                <!-- .focus-cause -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- End Focus Cause Section -->



    <!-- Start campaian video Section -->
    {{-- <section class="bg-compaian-video">
        <div class="compaian-video-overlay">
            <div class="container">
                <div class="row">
                    <div class="compaian-video">
                        <a href="{{ getSettingDataBySlug('letest_campaign_video_url') }}"
                            data-rel="lightcase:myCollection"><img
                                src="{{ asset('front/images/home02/video-icon.png') }}" alt="video-icon" /></a>
                        <h3>WATCH OUR LATEST CAMPAIGN VIDEO</h3>
                    </div>
                    <!-- .compaian-video -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .compaian-video-overlay -->
    </section> --}}
    <!-- End campaian video Section -->
    @if (isset($blogs) && $blogs->count()>0)
    <!-- Start Upcoming Events Section -->
    <section class="bg-upcoming-events">
        <div class="container">
            <div class="row">
                <div class="upcoming-events">
                    <div class="section-header">
                        <h2>Our Latest Blogs</h2>
                    </div>
                    <!-- .section-header -->
                    <div class="row">
                        <div class="blog-section blog-page">
                            <div class="row">
                                @if (isset($blogs))
                                    @foreach ($blogs as $blog)
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="blog-items">
                                                <div class="blog-img">
                                                    <a href="{{ route('front.blogView', $blog->slug) }}"><img
                                                            style="width: 416px; height: 303px;"
                                                            src="{{ $blog->image }}"
                                                            alt="{{ isset($blog->title) ? $blog->title : 'Blog Image' }}"
                                                            class="img-responsive"></a>
                                                </div>
                                                <!-- .blog-img -->
                                                <div class="blog-content-box">
                                                    <div class="blog-content">
                                                        <h4><a
                                                                href="{{ route('front.blogView', $blog->slug) }}">{{ isset($blog->title) ? $blog->title : 'Blog Title' }}</a>
                                                        </h4>
                                                        <p>{{ isset($blog->meta_description) ? setStringLength($blog->meta_description, 80) : 'Blog description' }}
                                                        </p>
                                                    </div>
                                                    <!-- .blog-content -->
                                                    <div class="meta-box">
                                                        <ul class="meta-post">
                                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                                {{ isset($blog->schedule_datetime) ? get_default_format($blog->schedule_datetime) : get_default_format($blog->created_at) }}
                                                            </li>
                                                            {{-- <li><a href="#"><i data-id="{{$blog->id}}" class="blog_like fa fa-heart-o" aria-hidden="true"></i>
                                                                    24
                                                                    Like</a></li> --}}
                                                            <li><a href="#"><i class="fa fa-commenting-o"
                                                                        aria-hidden="true"></i> 24
                                                                    Comment</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- .meta-box -->
                                                </div>
                                                <!-- .blog-content-box -->
                                            </div>
                                            <!-- .blog-items -->
                                        </div>
                                    @endforeach
                                    <!-- .row -->
                                    {{-- <div class="pagination-option">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <li>
                                                        <a href="#" aria-label="Previous">
                                                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">1</a></li>
                                                    <li class="active"><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">...</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li>
                                                        <a href="#" aria-label="Next">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div> --}}
                                    <!-- .pagination_option -->
                                @else
                                    No Blog Found.
                                @endif
                            </div>
                        </div>
                        <!-- .blog-section -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .upcoming-events -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @endif
    <!-- End Upcoming Events Section -->
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
    @push('styles')
        @include('front.capaigns_css')
    @endpush
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
         <script>
            $('.addToCartBTN').click(function() {
                var data_id = $(this).attr('data-id');
                var html = ` <span data-id="${data_id}" class="minus cart_decrement">-</span>
                                                <input type="text" data-id="${data_id}"
                                                    class="only_number cartOrderQtyValue"
                                                    id="cart_input${data_id}"
                                                    value="1">
                                                <span data-id="${data_id}" class="plus cart_increment">+</span>`;
                $('.addToCartBTNDiv'+data_id).html(html);
                addOrUpdateToCart(data_id, 1);
            });
            $(document).on("click", ".cart_decrement", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 1) {
                    return false;
                }
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) - 1);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amount${data_id}`).html(total_amt_html);
                $(input_selector).val(Number(cart_val) - 1);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val);
                }, 2000);
            });

            $(document).on("click", ".cart_increment", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                $(input_selector).val(Number(cart_val) + 1);
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) + 1);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amount${data_id}`).html(total_amt_html);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val);
                }, 2000);
            });

            $(document).on("click", ".cartOrderQtyValue", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 0) {
                    $(input_selector).val(1);
                    return false;
                }
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * Number(cart_val);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amount${data_id}`).html(total_amt_html);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val);
                }, 2000);
            });

            function addOrUpdateToCart(data_id, cart_val) {
                var url = `{{ url('/') }}/campaigns/add-or-update-cart/` + data_id;
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                        },
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: 'qty=' + cart_val,
                    })
                    .done(function(response) {
                        console.log('success');
                    })
                    .fail(function() {
                        console.log('failed');
                    });
            }
        </script>
    @endpush
@endsection
