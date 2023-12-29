@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Services</title>
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
    @if (isset($services) && $services->count() > 0)
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
                            @foreach ($services as $service)
                                <!-- .col-md-4 -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="our-services-box">
                                        <div class="our-services-items">
                                            <img style="width: 402px; height: 304px;" src="{{ isset($service->image) ? $service->image : null }}"
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
                    </div>
                    <!-- .row -->
                </div>
                <!-- .our-services-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @endif
    <!-- End Service Style2 Section -->
    <!-- Start campaian video Section -->
    {{-- <section class="bg-compaian-video">
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
    </section> --}}
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
                        @if (isset($categories) && $categories->count() > 0)
                        <button id="showAllProjects" class="button is-checked">show all</button>
                            @foreach ($categories as $key => $category)
                                <button data-id="{{ $category->id }}"
                                    class="single_category_projects button">{{ isset($category->category_name) ? $category->category_name : 'Na' }}</button>
                            @endforeach
                        @endif
                    </div>
                        <img src="{{asset('front/comming_soon.jpg')}}">
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
