@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Projects</title>
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
                            <h2>our project</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
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

    <section class="bg-single-recent-project">
        <div class="container">
            <div class="row">
                <div class="recent-project">
                    <div id="filters" class="button-group ">
                        @if (isset($categories) && $categories->count() > 0)
                        <button id="showAllProjects" class="button is-checked">show all</button>
                            @foreach ($categories as $key => $category)
                                <button data-id="{{ $category->id }}"
                                    class="single_category_projects button">{{ isset($category->category_name) ? $category->category_name : 'Na' }}</button>
                            @endforeach
                        @endif
                    </div>
                    <div class="category_wise_projects portfolio-items">
                    </div>
                    <!-- .isotope-items -->
                </div>
                <!-- .recent-project -->
                @if (isset($categories) && $categories->count() > 0)
                <div class="load-more-option" data-id="1" service-id="0">
                    <a href="javascript:;" class="btn btn-default">load more</a>
                </div>
                @else
                <div class="load-more-option" data-id="1" service-id="0">
                    <a href="javascript:;" class="btn btn-default">Comming Soon</a>
                </div>
                @endif
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>

    @push('scripts')
        <script>
            $('.load-more-option').click(function() {
                var page = Number($(this).attr('data-id')) + 1;
                $(this).attr('data-id', page);
                if(Number($(this).attr('service-id')) <= 0){
                    var url = `{{ url('/') }}/get-projects?page=${page}`;
                }else{
                    var id = Number($(this).attr('service-id'));
                    var url = `{{ url('/') }}/get-projects/${id}?page=${page}`;
                }
                getLandingPageContent(url);
            });
            $(document).ready(function() {
                var url = `{{ url('/') }}/get-projects?page=1`;
                getLandingPageContent(url);
            });

            $('.single_category_projects').click(function() {
                var page =  1;
                $('.load-more-option').attr('data-id',page);
                var id = $(this).attr('data-id');
                $('.load-more-option').attr('service-id', id);
                var url = `{{ url('/') }}/get-projects/` + id + `?page=${page}`;
                $('.category_wise_projects').html('');
                getLandingPageContent(url);
                $('#showAllProjects').removeClass('is-checked');
                $(this).addClass('is-checked');
            });

            $('#showAllProjects').click(function() {
                var page = 1;
                $('.load-more-option').attr('data-id',page);
                $('.load-more-option').attr('service-id', 0);
                var url = `{{ url('/') }}/get-projects` + `?page=${page}`;
                $('.category_wise_projects').html('');
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
                        $('.category_wise_projects').append(response.html);
                    });
            }
        </script>
    @endpush
@endsection
