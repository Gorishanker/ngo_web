@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Product</title>
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
                            <h2>{{ isset($product->title) ? $product->title : 'Propduct Title' }}</h2>
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
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="single-product-slider">
                                        <div id="slider" class="flexslider">
                                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                                <ul class="slides"
                                                    style="width: 2400%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">

                                                    <li class="flex-active-slide"
                                                        style="width: 389px; margin-right: 0px; float: left; display: block;">
                                                        <img style="max-width: 389px; max-height: 421px; width: 389px; height: 421px;"
                                                            src="{{ $product->image }}"
                                                            alt="{{ isset($product->title) ? $product->title : 'Propduct Title' }}"
                                                            draggable="false">
                                                    </li>
                                                    @foreach ($product->product_images as $image)
                                                        <li class=""
                                                            style="width: 389px; margin-right: 0px; float: left; display: block;">
                                                            <img style="max-width: 389px; max-height: 421px; width: 389px; height: 421px;"
                                                                src="{{ $image->image }}"
                                                                alt="{{ isset($product->title) ? $product->title : 'Propduct Title' }}"
                                                                draggable="false">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <ul class="flex-direction-nav">
                                                <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#"
                                                        tabindex="-1"></a></li>
                                                <li class="flex-nav-next"><a class="flex-next" href="#"></a></li>
                                            </ul>
                                        </div>
                                        <div id="carousel" class="flexslider">

                                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                                <ul class="slides"
                                                    style="width: 2400%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                                    <li class="flex-active-slide"
                                                        style="width: 74px; margin-right: 5px; float: left; display: block;">
                                                        <img style="max-width: 72px; max-height: 88px; width: 72px; height: 88px;"
                                                            src="{{ isset($product->image) ? $product->image : '' }}"
                                                            draggable="false">
                                                    </li>
                                                    @foreach ($product->product_images as $image)
                                                        <li class=""
                                                            style="width: 74px; margin-right: 5px; float: left; display: block;">
                                                            <img style="max-width: 72px; max-height: 88px; width: 72px; height: 88px;"
                                                                src="{{ $image->image }}"
                                                                alt="{{ isset($product->title) ? $product->title : 'Propduct Title' }}"
                                                                draggable="false">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <ul class="flex-direction-nav">
                                                <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#"
                                                        tabindex="-1"></a></li>
                                                <li class="flex-nav-next"><a class="flex-next" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- .single-product -->

                                </div>
                                <!-- .col-md-5 -->
                                <div class="col-md-7">
                                    <div class="about-product-datails">
                                        <h3>{{ isset($product->title) ? $product->title : 'Propduct Title' }}</h3>
                                        <h4>{{ isset($product->amount) ? currencyIcon() . $product->amount : '' }}</h4>
                                        <p>{{ isset($product->summery) ? $product->summery : '' }}</p>

                                        <div class="product-counter-option">
                                            <div class="product-count addToCartBTNDiv{{ $product->id }}">
                                                @if (isset($product->order_item->quantity))
                                                    <input data-id="{{ $product->id }}" type="submit"
                                                        class="cart_decrement" name="remove" value="-">
                                                    <input type="text" data-id="{{ $product->id }}"
                                                        id="cart_input{{ $product->id }}"
                                                        class="only_number cartOrderQtyValue" name="quantity"
                                                        value="{{ isset($product->order_item->quantity) ? $product->order_item->quantity : 1 }}">
                                                    <input type="submit" data-id="{{ $product->id }}"
                                                        class="cart_increment" name="add" value="+">
                                                @else
                                                    <p class="addToCartBTN" data-id="{{ $product->id }}"
                                                        style="max-width: 110px; background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px; cursor: pointer;">
                                                        Add to cart</p>
                                                @endif
                                            </div>
                                            <!-- .product-count -->
                                        </div>
                                        @if (getSettingDataBySlug('site_mode') == 1)
                                        <!-- .product-counter-option -->
                                        <a href="{{ route('front.cart') }}" class="btn add-cart-btn">Donate Now</a>
                                        @endif
                                    </div>
                                    <!-- .about-product-datails -->
                                </div>
                                <!-- .col-md-7 -->
                            </div>
                            <!-- .row -->



                            <div class="product-review">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation product_tab" class="active"><a href="#description"
                                            aria-controls="description" role="tab"
                                            data-bs-toggle="tab">Description</a>
                                    </li>
                                    <li role="presentation product_tab"><a href="#review" aria-controls="review"
                                            role="tab" data-bs-toggle="tab">Reviews
                                            {{ isset($product->total_rating) ? $product->total_rating : '' }}</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="product-description">
                                            <h4 class="description-title">Products Description</h4>
                                            <div class="desc-content">
                                                <p>{{ isset($product->description) ? $product->description : '' }}</p>
                                            </div>
                                            <!-- .desc-content -->
                                        </div>
                                        <!-- .product-description -->
                                    </div>
                                    <!-- .description -->
                                    <div role="tabpanel" class="tab-pane" id="review">
                                        <div class="review-content">
                                            @if (isset($reviews) && $reviews->count() > 0)
                                                <h4 class="description-title">Customer Reviews</h4>
                                                @foreach ($reviews as $review)
                                                    <div class="costomer-review-items">
                                                        <div class="customer-img">
                                                            <img src="{{ blankUserUrl() }}" alt="User profile"
                                                                style="max-width: 80px; max-height: 80px;">
                                                        </div>
                                                        <!-- .customer-img -->
                                                        <div class="customer-content">
                                                            <div class="customer-title">
                                                                <div class="customer-name">
                                                                    <h4><a
                                                                            href="#">{{ isset($review->name) ? $review->name : 'Gues User' }}</a>
                                                                        <small>Posted on
                                                                            {{ diffForHumans($review->created_at) }}</small>
                                                                    </h4>
                                                                </div>
                                                                <!-- .customer-name -->
                                                                <div class="rating">
                                                                    <ul class="star-icon">
                                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endfor
                                                                        @php
                                                                            $blank_star = 5 - $review->rating;
                                                                        @endphp
                                                                        @for ($i = 1; $i <= $blank_star; $i++)
                                                                            <i class="fa fa-star-o"
                                                                                aria-hidden="true"></i>
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                                <!-- .customer-name -->
                                                            </div>
                                                            <!-- .customer-title -->
                                                            <p>{{ isset($review->review) ? $review->review : '' }}</p>
                                                        </div>
                                                        <!-- .review-img -->
                                                        {{ $reviews->links() }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <!-- .review-content -->
                                        <div class="review-submit">
                                            <h4 class="review-submit-title">Add A Review</h4>
                                            {!! Form::open([
                                                'route' => 'front.campaignReview.store',
                                                'id' => 'ReviewForm',
                                                'method' => 'POST',
                                            ]) !!}
                                            {!! Form::hidden('product_id', $product->id) !!}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        {!! Form::text('name', null, ['placeholder' => 'Name*', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <!-- .col-md-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        {!! Form::text('email', null, ['placeholder' => 'Email*', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <!-- .col-md-4 -->
                                                <div class="col-md-4">
                                                    <input type="hidden" name="rating" value="5"
                                                        id="campaignReviewCount">
                                                    <div class="form-group campaignReviewCount"> Your rating:
                                                        <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star rating_star" data-val="2"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star rating_star" data-val="3"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star rating_star" data-val="4"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star rating_star" data-val="5"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <!-- .col-md-4 -->
                                            </div>
                                            <!-- .row -->
                                            {!! Form::textarea('review', null, [
                                                'placeholder' => 'Type Here Message*',
                                                'class' => 'form-control comments-textarea',
                                            ]) !!}
                                            <button type="submit" id="submit_review_form" class="btn btn-default">Submit
                                                REVIEW</button>
                                            </form>
                                        </div>
                                        <!-- .review-submit -->
                                    </div>
                                    <!-- .review -->
                                </div>
                                <!-- .Tab-content -->
                            </div>
                            <!-- .product-review -->
                        </div>
                        <!-- .col-lg-9 -->
                        <div class="col-lg-3">
                            <div class="shop-sidebar">
                                <div class="widget">
                                    <div class="shop-widget-content">
                                        <h4 class="shop-widget-title">Recent product</h4>
                                        @foreach ($products as $product)
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
                    </div>
                    <!-- .row -->
                </div>
                <!-- .shop-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @push('styles')
        <style>
             .fa.fa-star.rating_star{
                color:#53a92c;
            }
        </style>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Front\ReviewRequest', '#ReviewForm') !!}
        <script>
               $(document).on("click", ".rating_star", function() {
                var user_rating = $(this).attr('data-val');
                $('.campaignReviewCount').html('');
                $('#campaignReviewCount').val(user_rating);
                // var blank_star = 5 - user_rating;
                if (user_rating == 1) {
                    $('.campaignReviewCount').append(`Your rating: <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i>`);
                    $('.campaignReviewCount').append(
                        `<i class="fa fa-star-o rating_star" data-val="2" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="3" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="4" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="5" aria-hidden="true">`
                        )
                } else if (user_rating == 2) {
                    $('.campaignReviewCount').append(`Your rating: <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="2"
                                                            aria-hidden="true"></i>`);
                    $('.campaignReviewCount').append(
                        `<i class="fa fa-star-o rating_star" data-val="3" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="4" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="5" aria-hidden="true">`
                        )
                } else if (user_rating == 3) {
                    $('.campaignReviewCount').append(`Your rating: <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="2"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="3"
                                                            aria-hidden="true"></i>`);
                    $('.campaignReviewCount').append(
                        `<i class="fa fa-star-o rating_star" data-val="4" aria-hidden="true"><i class="fa fa-star-o rating_star" data-val="5" aria-hidden="true">`
                        )
                } else if (user_rating == 4) {
                    $('.campaignReviewCount').append(`Your rating: <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="2"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="3"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="4"
                                                            aria-hidden="true"></i>`);
                    $('.campaignReviewCount').append(
                        `<i class="fa fa-star-o rating_star" data-val="5" aria-hidden="true">`)
                } else if (user_rating == 5) {
                    $('.campaignReviewCount').append(`Your rating: <i class="fa fa-star rating_star" data-val="1"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="2"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="3"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="4"
                                                            aria-hidden="true"></i><i class="fa fa-star rating_star" data-val="5"
                                                            aria-hidden="true"></i>`);
                }

            });
            $('#ReviewForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('front.productReview.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#submit_review_form').html('Loading...');
                        $('#submit_review_form').addClass('disabled');
                        $('#submit_review_form').attr('disabled', true);
                    },
                    success: (response) => {
                        if (response.status == 1) {
                            $('#submit_review_form').html('Submitted');
                            $('#submit_review_form').removeClass('disabled');
                        } else {
                            $('#submit_review_form').html('Submit REVIEW');
                            $('#submit_review_form').removeClass('disabled');
                            $('#submit_review_form').attr('disabled', false);
                        }
                    },
                    error: function() {
                        $('#submit_review_form').html('Submit REVIEW');
                        $('#submit_review_form').removeClass('disabled');
                        $('#submit_review_form').attr('disabled', false);
                    },
                });
            });
        </script>
        <script>
                $(document).on("click", ".addToCartBTN", function() {
                var data_id = $(this).attr('data-id');
                var html = `  <input data-id="${data_id}" type="submit"
                                                        class="cart_decrement" name="remove" value="-">
                                                    <input type="text" data-id="${data_id}"
                                                        id="cart_input${data_id}"
                                                        class="only_number cartOrderQtyValue" name="quantity"
                                                        value="{{ isset($product->order_item->quantity) ? $product->order_item->quantity : 1 }}">
                                                    <input type="submit" data-id="${data_id}"
                                                        class="cart_increment" name="add" value="+">`;
                $('.addToCartBTNDiv' + data_id).html(html);
                addOrUpdateToCart(data_id, 1);
            });
            $(document).on("click", ".cart_decrement", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                if (Number(cart_val) <= 1) {
                 var html = ` <p class="addToCartBTN" data-id="${data_id}"
                                                        style="max-width: 110px; background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px; cursor: pointer;">
                                                        Add to cart</p>`;
                                                        $('.addToCartBTNDiv' + data_id).html(html);
                }else{
                    total_amt = total_amt * (Number(cart_val) - 1);
                }
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

            $(document).on("change", ".cartOrderQtyValue", function() {
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
                var url = `{{ url('/') }}/product/add-or-update-cart/` + data_id;
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
