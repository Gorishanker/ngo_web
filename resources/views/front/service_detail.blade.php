@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }}</title>
@endsection
@section('content')
    <section class="bg-page-header" style="background:  url({{ asset('front/images/about/bg-page-header.jpg') }}) no-repeat">
        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h2>{{ isset($service_detail->title) ? $service_detail->title : 'Service' }}</h2>
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

    <section class="bg-single-services">
        <div class="container">
            <div class="row">
                <div class="single-services">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="single-left-services-list">
                                @if (isset($services) && $services->count() > 0)
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($services as $service)
                                            <li role="presentation"><a
                                                    href="{{ route('front.serviceView', $service->slug) }}">{{ isset($service->title) ? setStringLength($service->title, 60) : 'Na' }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="download-service">
                                    <h4>Brochures dow:</h4>
                                    @foreach ($service_detail->service_docs as $service_doc)
                                        @if ($service_doc->type == 1)
                                            <a href="{{ $service_doc->file }}" class="download-btn"><i
                                                    class="fa fa-file-pdf-o" aria-hidden="true"></i> DOWNLOAD.PDF <span><i
                                                        class="fa fa-download" aria-hidden="true"></i></span></a>
                                        @elseif ($service_doc->type == 2)
                                            <a href="{{ $service_doc->file }}" class="download-btn"> <i
                                                    class="fa fa-file-image-o" aria-hidden="true"></i>DOWNLOAD.doc <span><i
                                                        class="fa fa-download" aria-hidden="true"></i></span></a>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- .download-option -->
                            </div>
                            <!-- .single-left-services-list -->
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-9">
                            <div class="tab-content">
                                <div>
                                    <div class="single-services-content">
                                        <img src="{{$service_detail->image}}"
                                            alt="{{ isset($service_detail->title) ? $service_detail->title : 'Service Image' }}" style="width: 1000px; height:500px;" class="img-responsive">
                                        <h3>{{ isset($service_detail->title) ? $service_detail->title : 'Na' }}</h3>
                                        {!!$service_detail->content!!}
                                    </div>
                                    <!-- .single-services-content -->
                                </div>
                            </div>
                            <!-- .tab-content -->

                        </div>
                        <!-- .col-lg-9 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .single-services -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
@endsection
