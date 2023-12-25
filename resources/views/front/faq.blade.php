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
                            <h2>faq's</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Faq's</li>
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

    <section class="bg-blog-section" style="width: 75%;margin: 0 auto;margin-top: 50px;">
        <div class="accordion" id="accordionExample">
            @if (isset($faqs) && $faqs->count()>0)
            @foreach ($faqs as $key=> $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                        {{$faq->question}}
                    </button>
                </h2>
                <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{$faq->answer}}
                    </div>
                </div>
            </div>
            @endforeach
            @else
            No faq found.
            @endif
        </div>
    </section>
@push('styles')
    <style>
        .accordion-button:not(.collapsed) {
    color: #53a92b;
    background-color: #53a92b17;
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.125);
}
    </style>
@endpush
@endsection
