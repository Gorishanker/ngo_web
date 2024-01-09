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
<section class="bg-page-header" style="background:  url({{ asset('front/images/about/bg-page-header.jpg') }}) no-repeat">
        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h2>{{isset($project_detail->title) ? $project_detail->title : 'Na'}}</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li>project</li>
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
                            <img src="{{$project_detail->image}}" style="width: 980px; height:570px;"  alt="{{$project_detail->title}}"
                                class="img-responsive">
                            <div class="single-pro-main-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="single-left-content">
                                            <li>
                                                <h4>Title:</h4>
                                                <p>{{isset($project_detail->title) ? $project_detail->title : 'Na'}}</p>
                                            </li>
                                            <li>
                                                <h4>Date:</h4>
                                                <p>{{isset($project_detail->start_date) ? get_default_format($project_detail->start_date, 'format', 'd M, Y') : get_default_format($project_detail->created_date, 'format', 'd M, Y')}} -- {{isset($project_detail->end_date) ? get_default_format($project_detail->end_date, 'format', 'd M, Y') : 'Continue..'}}</p>
                                            </li>
                                            <li>
                                                <h4>{{isset($project_detail->atuhor_type) ? $project_detail->atuhor_type : 'Client'}}:</h4>
                                                <p>{{isset($project_detail->author) ? $project_detail->author : 'Na'}}</p>
                                            </li>
                                            @if(isset($project_detail->category->category_name))
                                            <li>
                                                <h4>Category:</h4>
                                                <p>{{$project_detail->category->category_name}}</p>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- .col-md-4 -->
                                    <div class="col-lg-8">
                                        <div class="single-project-content" style="word-break: break-all;">
                                            <h3>Project Description</h3>
                                            {!!$project_detail->content!!}
                                        </div>
                                        <!-- .single-left-content -->
                                    </div>
                                    <!-- .col-md-8 -->
                                </div>
                            </div>
                            <!-- .single-proj-main-content -->
                        </div>
                        <!-- .col-lg-9 -->
                        <div class="col-lg-3">
                            <div class="single-right-content">
                                <ul class="single-small-img">
                                    @foreach ($project_detail->project_images as $project_image)
                                    <li><img src="{{$project_image->file}}" alt="{{$project_detail->title}}"
                                            class="img-responsive" style="width: 310px; height:170px;"></li>
                                    @endforeach
                                </ul>
                                <div class="download-option">
                                    <h4>Download Brochures</h4>
                                    @foreach ($project_detail->project_docs as $project_doc)
                                    @if ($project_doc->type == 1)
                                                    <a href="{{ $project_doc->file }}" class="download-btn"><i class="fa fa-file-pdf-o"
                                                        aria-hidden="true"></i> DOWNLOAD.PDF <span><i class="fa fa-download"
                                                            aria-hidden="true"></i></span></a>
                                    @elseif ($project_doc->type == 2)
                                    <a href="{{ $project_doc->file }}" class="download-btn"> <i class="fa fa-file-image-o"
                                        aria-hidden="true"></i>DOWNLOAD.doc <span><i class="fa fa-download"
                                            aria-hidden="true"></i></span></a>
                                    @endif
                                @endforeach
                                </div>
                                <!-- .download-option -->
                                <div class="social-option">
                                    <h4>Share this project :</h4>
                                    <ul class="social-icon-rounded">
                                        <li><a href="javascript:;"><i class="share-button fa fa-facebook" aria-hidden="true" data-share="facebook"></i></a></li>
                                        <li><a href="javascript:;"><i class="share-button fa fa-twitter" aria-hidden="true" data-share="twitter"></i></a></li>
                                        <li><a href="javascript:;"><i class="share-button fa fa-whatsapp" aria-hidden="true" data-share="whatsapp"></i></a></li>
                                        <li><a href="javascript:;"><i class="share-button fa fa-linkedin" aria-hidden="true" data-share="linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <!-- .social-option -->
                            </div>
                            <!-- .single-right-content -->
                        </div>
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
        document.querySelectorAll('.share-button').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                var socialMedia = button.getAttribute('data-share');
                var urlToShare = window.location.href;
                var shareURL = '';
                if (socialMedia === 'facebook') {
                    shareURL = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(urlToShare);
                } else if (socialMedia === 'twitter') {
                    shareURL = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(urlToShare);
                } else if (socialMedia === 'linkedin') {
                    shareURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(urlToShare);
                }  else if (socialMedia === 'whatsapp') {
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
