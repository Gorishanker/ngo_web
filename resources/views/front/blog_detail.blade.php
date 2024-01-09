@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Blogs</title>
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
                            <h2>{{ $blog_detail->title }}</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>blog</li>
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
    <section class="bg-single-blog">
        <div class="container">
            <div class="row">
                <div class="single-blog">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-items">
                                <div class="blog-img">
                                    <a href=""><img style="width: 856px; height: 411px;" src="{{ $blog_detail->image }}"
                                            style="width: auto; height: 400px;" alt="blog-img-10"
                                            class="img-responsive"></a>
                                </div>
                                <!-- .blog-img -->
                                <div class="blog-content-box">
                                    <div class="meta-box">
                                        @if (isset($blog_detail->author))
                                            <div class="event-author-option">
                                                <!-- .author-img -->
                                                <div class="event-author-name">
                                                    <p>Posted by : <a href="javascript:void(0);"> {{ $blog_detail->author }}</a></p>
                                                </div>
                                                <!-- .author-name -->
                                            </div>
                                        @endif
                                        <!-- .author-option -->
                                        <ul class="meta-post">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{ isset($blog_detail->schedule_datetime) ? get_default_format($blog_detail->schedule_datetime) : get_default_format($blog_detail->created_at) }}
                                            </li>
                                            {{-- <li><a href="javascript:void(0);"><i class="fa fa-heart-o" aria-hidden="true"></i> 24 Like</a></li> --}}
                                            <li><a href="javascript:void(0);"><i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                    {{ isset($blog_detail->total_comments) ? $blog_detail->total_comments : 0 }}
                                                    Comment</a></li>
                                        </ul>
                                    </div>
                                    <!-- .meta-box -->
                                    <div class="blog-content" style="word-break: break-all;">
                                        {!! isset($blog_detail->content) ? $blog_detail->content : 'Blog description not found.' !!}
                                    </div>
                                    <!-- .blog-content -->
                                    <div class="single-blog-bottom">
                                        <div class="event-share-option">
                                            <ul class="social-icon share-icon">
                                                <li><i class="fa fa-share-alt" aria-hidden="true"></i><span>share :</span>
                                                </li>
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
                                        <!-- .share-option -->
                                    </div>
                                    <!-- .single-blog-bottom -->
                                </div>
                                <!-- .blog-content-box -->
                            </div>
                            <!-- .blog-items -->
                            @if (isset($comments) && $comments->count() > 0)
                                <div class="comments-option">
                                    <h4 class="comments-title">{{ $comments->count() }} Comments</h4>
                                    @foreach ($comments as $comment)
                                        <div class="comments-items">
                                            <div class="comments-image">
                                                <img style="width: 80px; height: 80px;" src="{{ blankUserUrl() }}"
                                                    alt="User profile image">
                                            </div>
                                            <!-- .comments-image -->
                                            <div class="comments-content">
                                                <div class="comments-author-title">
                                                    <div class="comments-author-name">
                                                        <h4><a href="javascript:void(0);">{{ $comment->name }}</a> -
                                                            <small>{{ diffForHumans($comment->created_at) }}</small>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <!-- .comments-author-title -->
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                            <!-- .comments-content -->
                                        </div>
                                    @endforeach
                                </div>
                                {{$comments->links()}}
                                <!-- .comments-option -->
                            @endif

                            <div class="comments-form">
                                <h4 class="comments-title">Leave A Reply</h4>
                                {!! Form::open([
                                    'route' => 'front.blogComment.store',
                                    'id' => 'CommentForm',
                                    'method' => 'POST',
                                ]) !!}
                                    {!! Form::hidden('blog_id', $blog_detail->id) !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::text('name', null, [ 'placeholder' => 'Name*', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <!-- .col-md-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::text('email', null, [ 'placeholder' => 'Email*', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <!-- .col-md-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                {!! Form::text('website', null, [ 'placeholder' => 'Website', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::textarea('comment', null, [ 'placeholder' => 'Comments*', 'class' => 'form-control comments-textarea']) !!}
                                            (Max length 300 character)
                                        </div>
                                    </div>
                                    <!-- .col-md-4 -->
                                </div>
                                <!-- .row -->

                                <button type="submit" id="submit_form" class="btn btn-default">submit Comment</button>
                                {!! Form::close() !!}
                            </div>
                            <!-- .comments-form -->

                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar">
                                <!-- .widget -->
                                @if (isset($blogs) && $blogs->count() > 0)
                                    <div class="widget">
                                        <h4 class="sidebar-widget-title">Popular Blogs</h4>
                                        <div class="widget-content">
                                            <ul class="popular-news-option">
                                                @foreach ($blogs as $blog)
                                                    <li>
                                                        <div class="popular-news-img">
                                                            <a href="javascript:void(0);"><img style="width: 75px; height: 75px;"
                                                                    src="{{ $blog->image }}"
                                                                    alt="{{ isset($blog->title) ? $blog->title : 'Blog Image' }}"></a>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                        <div class="popular-news-contant">
                                                            <h5><a
                                                                    href="#">{{ isset($blog->title) ? setStringLength($blog->title, 50) : 'Na' }}</a>
                                                            </h5>
                                                            <p> {{ isset($blog->schedule_datetime) ? get_default_format($blog_detail->schedule_datetime) : get_default_format($blog_detail->created_at) }}
                                                            </p>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                @endif
                                <div class="widget">
                                    <h4 class="sidebar-widget-title">photo gallery</h4>
                                    <div class="widget-content">
                                        <div class="gallery-instagram">
                                            @foreach (getGalleryImages() as $photo)
                                                <a href="{{ $photo->file }}"><img style="width: 100px; height: 90px;"
                                                        src="{{ isset($photo->file) ? $photo->file : asset('front/images/event/photo-gallery-small-img-1.jpg') }}"
                                                        alt="{{ isset($photo->category->category_name) ? $photo->category->category_name : 'Gallery image' }}"></a>
                                            @endforeach
                                        </div>
                                        <!-- .gallery-instagram -->
                                    </div>
                                    <!-- .widget-content -->
                                </div>
                            </div>
                            <!-- .sidebar -->
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .single-blog -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section> @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />
    @endpush
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Front\BlogCommentRequest', 'form') !!}
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
        <script>
            $('#CommentForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('front.blogComment.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                     beforeSend: function() {
                        $('#submit_form').html('Loading...');
                        $('#submit_form').addClass('disabled');
                        $('#submit_form').attr('disabled', true);
                    },
                    success: (response) => {
                        if (response.status == 1) {
                            this.reset();
                            Swal.fire(response.message);
                            $('#submit_form').html('submit Comment');
                                $('#submit_form').removeClass('disabled');
                                $('#submit_form').attr('disabled', false);
                        } else {
                                 $('#submit_form').html('submit Comment');
                                $('#submit_form').removeClass('disabled');
                                $('#submit_form').attr('disabled', false);
                        }
                    },
                     error: function() {
                         $('#submit_form').html('submit Comment');
                                $('#submit_form').removeClass('disabled');
                                $('#submit_form').attr('disabled', false);
                    },
                });
            });
        </script>
    @endpush
@endsection
