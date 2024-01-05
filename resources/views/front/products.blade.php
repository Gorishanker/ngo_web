@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Products</title>
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
                            <h2>product page</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Shop</li>
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
    <section class="bg-shop-section">
        <div class="container">
            <div class="row">
                <div class="shop-option">
                    <div class="row">
                        @if (isset($products) && $products->count() > 0)
                            <div class="col-lg-9">
                                <div class="shop-results-box">
                                    <!-- .results-number -->
                                    <div class="results-icon">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#grid" aria-controls="home"
                                                    role="tab" data-bs-toggle="tab" class=""
                                                    aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a>
                                            </li>
                                            <li role="presentation"><a href="#list" aria-controls="profile" role="tab"
                                                    data-bs-toggle="tab" class="active" aria-selected="true"><i
                                                        class="fa fa-th" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- .results-icon -->
                                </div>
                                <!-- .results-box -->
                                <div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="list">
                                            <div class="shop-collection">
                                                <div class="row">
                                                    @foreach ($products as $product)
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="collection-items">
                                                                <div class="collection-img">
                                                                    <div class="collection-overlay"></div>
                                                                    <a
                                                                        href="{{ route('front.product.show', $product->slug) }}">
                                                                        <img style="max-width: 304px; max-height: 338px;"
                                                                            src="{{ $product->image }}"
                                                                            alt="{{ isset($product->title) ? $product->title : 'Product Image' }}"></a>
                                                                </div>
                                                                <!-- .collection-img -->
                                                                <div class="collection-content">
                                                                    <h4><a
                                                                            href="{{ route('front.product.show', $product->slug) }}">{{ isset($product->title) ? setStringLength($product->title) : 'Product Text' }}</a>
                                                                    </h4>
                                                                    <h5>{{ isset($product->amount) ? currencyIcon() . $product->amount : '' }}
                                                                    </h5>
                                                                    {{-- <ul class="star-icon">
                                                                        @for ($i = 1; $i <= $product->avg_rating; $i++)
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endfor
                                                                        @php
                                                                            $blank_star = 5 - $product->avg_rating;
                                                                        @endphp
                                                                        @for ($i = 1; $i <= $blank_star; $i++)
                                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                        @endfor
                                                                    </ul> --}}
                                                                </div>
                                                                <!-- .collection-content -->
                                                            </div>
                                                            <!-- .collection-items -->
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- .row -->
                                            </div>

                                            {{ $products->links() }}

                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="grid">
                                            <div class="shop-grid-view">
                                                <div class="shop-collection">
                                                    <div class="row">
                                                        @foreach ($products as $product)
                                                            <!-- .col-md-4 -->
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="collection-items">
                                                                    <div class="collection-img">
                                                                        <div class="collection-overlay"></div>
                                                                        <a
                                                                            href="{{ route('front.product.show', $product->slug) }}">
                                                                            <img style="max-width: 304px; max-height: 338px;"
                                                                                src="{{ $product->image }}"
                                                                                alt="{{ isset($product->title) ? $product->title : 'Product Image' }}"></a>
                                                                    </div>
                                                                    <!-- .collection-img -->
                                                                    <div class="collection-content">
                                                                        <h4><a
                                                                                href="{{ route('front.product.show', $product->slug) }}">{{ isset($product->title) ? $product->title : 'Product Title' }}</a>
                                                                        </h4>
                                                                        <h5>{{ isset($product->amount) ? currencyIcon() . $product->amount : '' }}
                                                                        </h5>
                                                                        {{-- <ul class="star-icon">
                                                                            @for ($i = 1; $i <= $product->avg_rating; $i++)
                                                                                <i class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                            @endfor
                                                                            @php
                                                                                $blank_star = 5 - $product->avg_rating;
                                                                            @endphp
                                                                            @for ($i = 1; $i <= $blank_star; $i++)
                                                                                <i class="fa fa-star-o"
                                                                                    aria-hidden="true"></i>
                                                                            @endfor
                                                                        </ul> --}}
                                                                        <p>{{ isset($product->summery) ? $product->summery : 'Product Summery' }}
                                                                        </p>
                                                                    </div>
                                                                    <!-- .collection-content -->
                                                                </div>
                                                                <!-- .collection-items -->
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- .row -->
                                                </div>
                                                <!-- .shop-collection-->
                                                {{ $products->links() }}
                                                <!-- .pagination_option -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- .col-md-9 -->
                            <div class="col-lg-3">
                                <div class="shop-sidebar">

                                    <div class="widget">
                                        <div class="shop-widget-content">
                                            <h4 class="shop-widget-title">Filter by Price</h4>
                                            <div class="nstSlider"
                                                data-range_min="{{ $min_amount }}" data-range_max="{{ $max_amount }}"
                                                data-cur_min="{{ isset(request()->min_amt) ? request()->min_amt : $min_amount }}"
                                                data-cur_max="{{ isset(request()->max_amt) ? request()->max_amt : $max_amount }}">

                                                <div class="bar" style="left: 23px; width: 164px;"></div>
                                                <div class="leftGrip" tabindex="0" style="left: 23px;"></div>
                                                <div class="rightGrip" tabindex="0" style="left: 181px;"></div>
                                            </div>

                                            <div class="price-rang">
                                                <span class="price">Price:</span>
                                                <div class="low-price">
                                                    <span class="currency">{{ currencyIcon() }}</span>
                                                    <span class="leftLabel productPriceRangeSlider">{{ $min_amount }}</span>
                                                </div>

                                                <div class="high-price">
                                                    <span class="currency">{{ currencyIcon() }}</span>
                                                    <span class="rightLabel productPriceRangeSlider">{{ $max_amount }}</span>
                                                </div>
                                                <p style="cursor:pointer;" id="productPriceFilter" class="filter-btn">
                                                    Filter Now</p>
                                            </div>
                                            <!-- .price-rang -->

                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                    <div class="widget">
                                        <div class="shop-widget-content">
                                            <h4 class="shop-widget-title">Recent product</h4>
                                            @foreach ($latest_products as $product)
                                                <div class="small-product-items">
                                                    <div class="small-product-img">
                                                        <a style="max-width: 70px; max-height: 70px;"
                                                            href="{{ route('front.product.show', $product->slug) }}"><img
                                                                src="{{ $product->image }}"
                                                                alt="{{ isset($product->title) ? $product->title : 'Product Image' }}"></a>
                                                    </div>
                                                    <!-- .small-product-img -->
                                                    <div class="small-product-content">
                                                        <h5><a
                                                                href="{{ route('front.product.show', $product->slug) }}">{{ isset($product->title) ? setStringLength($product->title) : 'Product Image' }}</a>
                                                        </h5>
                                                        {{-- @dd($product) --}}
                                                        <p>{{ isset($product->amount) ? currencyIcon() . $product->amount : '' }}
                                                        </p>
                                                        <ul class="star-icon">
                                                            @for ($i = 1; $i <= $product->avg_rating; $i++)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor
                                                            @php
                                                                $blank_star = 5 - $product->avg_rating;
                                                            @endphp
                                                            @for ($i = 1; $i <= $blank_star; $i++)
                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <!-- .small-product-content -->
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                    <!-- .widget -->

                                </div>
                                <!-- .sidebar -->
                            </div>
                            <!-- .col-lg-3 -->
                        @else
                            <img src="{{ asset('front/comming_soon.jpg') }}">
                        @endif
                    </div>
                    <!-- .row -->
                </div>
                <!-- .shop-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @push('scripts')
        <script>
            $('#productPriceFilter').click(function() {
                var min_amt = $('.leftLabel.productPriceRangeSlider').html();
                var max_amt = $('.rightLabel.productPriceRangeSlider').html();
                if(min_amt && max_amt){
                    window.location.href = '?min_amt=' + min_amt + '&max_amt=' + max_amt;
                }
            });
        </script>
    @endpush
@endsection
