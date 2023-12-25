@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Impact Story</title>
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
                            <h2>{{ $impact->title }}</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>impact</li>
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
    <section class="bg-single-project">
        <div class="container">
            <div class="row">
                <div class="single-project">
                    <div class="row">
                        <div class="col-lg-9">
                            <img src="{{ $impact->image }}" style="width: 980px; height:570px;" alt="{{ $impact->title }}"
                                class="img-responsive">
                            <div class="single-pro-main-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="single-left-content">
                                            <li>
                                                <h4>Title:</h4>
                                                <p>{{ isset($impact->title) ? $impact->title : 'Na' }}</p>
                                            </li>
                                            <li>
                                                <h4>Date::</h4>
                                                <p>{{ isset($impact->created_at) ? get_default_format($impact->created_at) : 'Na' }}
                                                </p>
                                            </li>
                                            @if (isset($impact->project->title))
                                                <li>
                                                    <h4>Project:</h4>
                                                    <p>{{ $impact->project->title }}</p>
                                                </li>
                                            @endif
                                        </ul>
                                        <!-- .download-option -->
                                        <div class="social-option">
                                            <h4>Share this project :</h4>
                                            <ul class="social-icon-rounded">
                                                <li><a href="javascript:;"><i class="share-button fa fa-facebook"
                                                            aria-hidden="true" data-share="facebook"></i></a></li>
                                                <li><a href="javascript:;"><i class="share-button fa fa-twitter"
                                                            aria-hidden="true" data-share="twitter"></i></a></li>
                                                <li><a href="javascript:;"><i class="share-button fa fa-whatsapp"
                                                            aria-hidden="true" data-share="whatsapp"></i></a></li>
                                                <li><a href="javascript:;"><i class="share-button fa fa-linkedin"
                                                            aria-hidden="true" data-share="linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- .social-option -->
                                    </div>
                                    <!-- .col-md-4 -->
                                    <div class="col-lg-8">
                                        <div class="single-project-content" style="word-break: break-all;">
                                            <h3>Project Description</h3>
                                            {!! $impact->content !!}
                                        </div>
                                        <!-- .single-left-content -->
                                    </div>
                                    <!-- .col-md-8 -->
                                        <div class="single-right-content" style="margin: 5px">
                                                @foreach ($impact->impact_images as $impact_image)
                                                   <a href="{{ $impact_image->image }}"><img src="{{ $impact_image->image }}" alt="{{ $impact->title }}"
                                                            class="img-responsive" style="width: 310px; height:170px;"></a>
                                                @endforeach
                                        </div>
                                        <!-- .single-right-content -->
                                </div>
                            </div>
                            <!-- .single-proj-main-content -->
                        </div>
                        <!-- .col-lg-9 -->
                        <!-- .col-lg-3 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .single-project -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @push('scripts')
        <script>
            document.querySelectorAll('.share-button').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var socialMedia = button.getAttribute('data-share');
                    var urlToShare = window.location.href;
                    var shareURL = '';
                    if (socialMedia === 'facebook') {
                        shareURL = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(
                            urlToShare);
                    } else if (socialMedia === 'twitter') {
                        shareURL = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(urlToShare);
                    } else if (socialMedia === 'linkedin') {
                        shareURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(
                            urlToShare);
                    } else if (socialMedia === 'whatsapp') {
                        shareURL = 'https://wa.me/?text=' + encodeURIComponent(urlToShare);
                    }

                    if (shareURL) {
                        window.open(shareURL, 'Share', 'width=600,height=400');
                    }
                });
            });
        </script>
    @endpush
@endsection
