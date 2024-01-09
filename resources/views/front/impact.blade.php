@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Impact Stories</title>
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
                            <h2>our stories</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Impact stories</li>
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

    <section class="bg-blog-section">
        <div class="container">
            <div class="row">
                <div class="blog-section blog-page">
                    <div class="row">
                        @if (isset($impacts) && $impacts->total() > 0)
                            @foreach ($impacts as $impact)
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="blog-items">
                                        <div class="blog-img">
                                            <a href="{{route('front.impactStory.show', $impact->slug)}}"><img style="width: 416px; height: 303px;" src="{{ $impact->image }}"
                                                    alt="{{ isset($impact->title) ? $impact->title : 'Impact Image' }}"
                                                    class="img-responsive"></a>
                                        </div>
                                        <!-- .blog-img -->
                                        <div class="blog-content-box">
                                            <div class="blog-content">
                                                <h4><a
                                                        href="{{route('front.impactStory.show', $impact->slug)}}">{{ isset($impact->title) ? $impact->title : 'Impact Title' }}</a>
                                                </h4>
                                                <p>{{ isset($impact->content) ? setStringLength(strip_tags($impact->content), 80) : 'Impact description' }}
                                                </p>
                                            </div>
                                            <!-- .blog-content -->
                                            <div class="meta-box">
                                                <ul class="meta-post">
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ isset($impact->created_at) ? get_default_format($impact->created_at) : '' }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .meta-box -->
                                        </div>
                                        <!-- .blog-content-box -->
                                    </div>
                                    <!-- .blog-items -->
                                </div>
                            @endforeach

                            {{ $impacts->links() }}
                            <!-- .row -->
                            {{-- <div class="pagination-option">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <li>
                                                <a href="#" aria-label="Previous">
                                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li><a href="javascript:void(0);">1</a></li>
                                            <li class="active"><a href="javascript:void(0);">2</a></li>
                                            <li><a href="javascript:void(0);">3</a></li>
                                            <li><a href="javascript:void(0);">...</a></li>
                                            <li><a href="javascript:void(0);">5</a></li>
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
                        <img src="{{asset('front/comming_soon.jpg')}}">
                        @endif
                    </div>
                </div>
                <!-- .blog-section -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-blog-section -->
    </section>
@endsection
