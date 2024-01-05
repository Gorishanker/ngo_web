@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Campaign</title>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! SEO::generate() !!}
@endsection
@section('content')
    @php
        $raised_percent = ($campaign_detail->raise_amount / $campaign_detail->target_amount) * 100;
    @endphp
    <section class="py-5 image-tab">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-12">
                    <div class="details-left">
                        <div class="productImage">
                            <img id="largeImage" style="width:636px; height: 634px;" src="{{ $campaign_detail->image }}"
                                alt="{{ isset($campaign_detail->title) ? $campaign_detail->title : 'Campaign image' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-12">

                    <div class="details-poduct">
                        <h1>{{ isset($campaign_detail->title) ? $campaign_detail->title : 'Campaign title' }}</h1>
                        @if ($campaign_detail->average_rating < 0)
                            <span class="rating">
                                @for ($i = 1; $i <= $campaign_detail->average_rating; $i++)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endfor
                                @php
                                    $blank_star = 5 - $campaign_detail->average_rating;
                                @endphp
                                @for ($i = 1; $i <= $blank_star; $i++)
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endfor
                                ({{ $campaign_detail->total_rating }}) reviews
                            </span>
                        @endif
                        <p class="mb-0 pay" id="getCampaignTotalAmount">
                            {{ currencyIcon() }}{{ isset($campaign_detail->order_item->total_amount) ? round($campaign_detail->order_item->total_amount) : $campaign_detail->campaign_combos[0]->price }}
                        </p>
                        @php
                            $f_active = 'active';
                            if (isset($campaign_detail->order_item->combo_id)) {
                                foreach ($campaign_detail->campaign_combos as $combo) {
                                    if ($campaign_detail->order_item->combo_id == $combo->id) {
                                        $f_active = null;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        <div class="tree-select">
                            <label>Select your offers</label>
                            <ul class="navbar-mini">
                                @if (isset($campaign_detail->campaign_combos) && $campaign_detail->campaign_combos->count() > 0)
                                    @foreach ($campaign_detail->campaign_combos as $key => $combo)
                                        @if (isset($campaign_detail->order_item->combo_id))
                                            @if ($campaign_detail->order_item->combo_id == $combo->id)
                                                <li class="nav-item changeCampaignVariation" data-id="{{ $combo->id }}">
                                                    <a href="#" data-val="{{ $combo->id }}"
                                                        class="nav-main active changeNavMain">{{ $combo->name }}</a>
                                                </li>
                                            @else
                                                <li class="nav-item changeCampaignVariation" data-id="{{ $combo->id }}">
                                                    <a href="#" data-val="{{ $combo->id }}"
                                                        class="nav-main changeNavMain">{{ $combo->name }}</a>
                                                </li>
                                            @endif
                                        @else
                                            @if ($key == 0)
                                                <li class="nav-item changeCampaignVariation" data-id="{{ $combo->id }}">
                                                    <a href="#" data-val="{{ $combo->id }}"
                                                        class="nav-main {{ $f_active }} changeNavMain">{{ $combo->name }}</a>
                                                </li>
                                            @else
                                                <li class="nav-item changeCampaignVariation" data-id="{{ $combo->id }}">
                                                    <a href="#" data-val="{{ $combo->id }}"
                                                        class="nav-main changeNavMain">{{ $combo->name }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="number addToCartBTNDiv{{ $campaign_detail->id }}">
                                @if (isset($campaign_detail->order_item->quantity))
                                    <span data-id="{{ $campaign_detail->id }}" class="minus cart_decrement">-</span>
                                    <input type="text" data-id="{{ $campaign_detail->id }}"
                                        class="only_number cartOrderQtyValue" id="cart_input{{ $campaign_detail->id }}"
                                        value="{{ isset($campaign_detail->order_item->quantity) ? $campaign_detail->order_item->quantity : 1 }}">
                                    <span data-id="{{ $campaign_detail->id }}" class="plus cart_increment">+</span>
                                @else
                                    <p class="addToCartBTN" data-id="{{ $campaign_detail->id }}"
                                        style="background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px; cursor: pointer;">
                                        Add to Cart</p>
                                @endif
                            </div>
                        </div>

                        <div class="progress-tp-head" style="padding-top: 15px;">
                            <div class="bar-value">
                                <span>Total Price:
                                    <b>{{ currencyIcon() }}{{ $campaign_detail->target_amount }}</b></span>
                                <span>Raised:
                                    <b>{{ currencyIcon() }}{{ $campaign_detail->raise_amount }}</b></span>
                            </div>
                            <div class="progress skill-bar " style="margin-bottom: 10px;">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $raised_percent }}%;">

                                </div>
                            </div>
                        </div>
                        @if (isset($campaign_detail->hint))
                            <div class="hint">
                                {!! $campaign_detail->hint !!}
                            </div>
                        @endif


                        <div id="gift-accasion-div" class="gift-accasion {{ isset($f_active) ? 'd-none' : '' }}">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-gift"></i> Gift Trees
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#occasionModal">
                                <i class="fa-solid fa-tree"></i> Occasion
                            </a>
                        </div>

                        <div class="add-card">
                            @if (getSettingDataBySlug('site_mode') == 1)
                                <a href="{{ route('front.cart') }}">DONATE NOW</a>
                            @endif
                        </div>

                    </div>
                </div>
                @if (isset($campaign_detail->benefit))
                    <div class="acordian-main">
                        {!! $campaign_detail->benefit !!}
                    </div>
                @endif
            </div>

            @if (isset($campaign_detail->short_description))
                <div class="col-md-12">
                    <div class="discription">
                        {!! $campaign_detail->short_description !!}
                    </div>
                </div>
            @endif

            <div class="trending-today">
                <h3 style="color:black">Trending Today</h3>
                <div class="row">
                    @foreach ($campaigns as $campaign)
                        @php
                            $raised_percent = ($campaign->raise_amount / $campaign->target_amount) * 100;
                        @endphp
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12 col-lg-3">
                            <div class="list-box">
                                <div class="img-box">
                                    <a href="{{ route('front.campaign.show', $campaign->slug) }}">
                                        <img src="{{ $campaign->image }}"
                                            alt="{{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}"
                                            style="width:304px; height:228px;">
                                    </a>
                                </div>

                                <div class="details-box">
                                    <div class="progress-tp-head">
                                        <div class="bar-value">
                                            <span>Ask Amount:
                                                <b>{{ currencyIcon() }}{{ $campaign->target_amount }}</b></span>
                                            <span>Raised:
                                                <b>{{ currencyIcon() }}{{ $campaign->raise_amount }}</b></span>
                                        </div>
                                        <div class="progress skill-bar ">
                                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $raised_percent }}%;">

                                            </div>
                                        </div>
                                    </div>
                                    <h6>
                                        <a href="{{ route('front.campaign.show', $campaign->slug) }}">
                                            {{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}
                                        </a>
                                    </h6>

                                    <div class="with-cart">
                                        <p class="mb-0" id="cart_total_amountLetest{{ $campaign->id }}"
                                            data-value="{{ $campaign->campaign_combos[0]->price }}">Amount
                                            {{ currencyIcon() }}{{ isset($campaign->order_item->total_amount) ? round($campaign->order_item->total_amount) : $campaign->campaign_combos[0]->price }}</span>
                                        </p>
                                        <div class="number addToCartBTNDivLetest{{ $campaign->id }}">
                                            @if (isset($campaign->order_item->quantity))
                                                <span data-id="{{ $campaign->id }}"
                                                    class="minus cart_decrementLetest">-</span>
                                                <input type="text" data-id="{{ $campaign->id }}"
                                                    class="only_number cartOrderQtyValueLetest"
                                                    id="cart_inputLetest{{ $campaign->id }}"
                                                    value="{{ isset($campaign->order_item->quantity) ? $campaign->order_item->quantity : 1 }}">
                                                <span data-id="{{ $campaign->id }}"
                                                    class="plus cart_incrementLetest">+</span>
                                            @else
                                                <p class="addToCartBTNLetest" data-id="{{ $campaign->id }}"
                                                    style="background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px;border-radius: 5px; cursor: pointer;">
                                                    Add to Cart</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="cart-btn">
                                        {{-- <span>
                                                @for ($i = 1; $i <= $campaign->average_rating; $i++)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor
                                                @php
                                                    $blank_star = 5 - $campaign->average_rating;
                                                @endphp
                                                @for ($i = 1; $i <= $blank_star; $i++)
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @endfor
                                                ({{ $campaign->total_rating }})
                                            </span> --}}

                                        @if (getSettingDataBySlug('site_mode') == 1)
                                            <a href="{{ route('front.donate') }}" data-id="{{ $campaign->id }}">Donate
                                                Now</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="trand-view">
                    <a href="{{ route('front.campaigns.index') }}">View All</a>
                </div>
            </div>
            @if (isset($campaign_detail->primary_description))
                <div class="scope">
                    {!! $campaign_detail->primary_description !!}
                </div>
            @endif
            @if (isset($campaign_detail->secondary_description))
                <div class="tree-species">
                    {!! $campaign_detail->secondary_description !!}
                </div>
            @endif
        </div>
    </section>
    <section class="bg-shop-section" style="padding: 0 0">
        <div class="container">
            <div class="row">
                <div class="shop-option">
                    <div class="row">
                        <div class="col-lg-9">


                            <div class="product-review">
                                @if (isset($reviews) && $reviews->count() > 0)
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#description"
                                                aria-controls="description" role="tab"
                                                data-bs-toggle="tab">Reviews</a>
                                        </li>
                                    </ul>
                                @endif

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="review">
                                        @if (isset($reviews) && $reviews->count() > 0)
                                            <div class="review-content">
                                                <h4 class="description-title">Customer Reviews</h4>
                                                @foreach ($reviews as $review)
                                                    <div class="costomer-review-items">
                                                        <div class="customer-img">
                                                            <img src="{{ blankUserUrl() }}" alt="User profile image">
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
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{ $reviews->links() }}
                                        @endif
                                        <!-- .review-content -->
                                        <div class="review-submit">
                                            <h4 class="review-submit-title">Add A Review</h4>
                                            {!! Form::open([
                                                'route' => 'front.campaignReview.store',
                                                'id' => 'ReviewForm',
                                                'method' => 'POST',
                                            ]) !!}
                                            {!! Form::hidden('campaign_id', $campaign_detail->id) !!}
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::textarea('review', null, [
                                                            'placeholder' => 'Type Here Message*',
                                                            'class' => 'form-control comments-textarea',
                                                        ]) !!}
                                                    (Max length 250 character)
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .row -->
                                            <button type="submit" id="submit_review_form"
                                                class="btn btn-default mb-5">Submit
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
                    </div>
                    <!-- .row -->
                </div>
                <!-- .shop-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-head">
                        <h2>GIVE THE GIFT OF TREES!</h2>
                        <p class="mb-0">Scroll to the right of the carousel below to select from more card options.</p>
                        <b>A Tree Certificate will be sent to the recipient with the e-card.</b>
                        {{-- <p>Need help gifting? <a href="#">Click here</a> for our guide!</p> --}}
                    </div>
                    {!! Form::open([
                        'id' => 'GiftTreeFormForm',
                        'route' => 'front.submitGirtTree',
                        'method' => 'POST',
                    ]) !!}
                    <input type="hidden" name="campaign_id" value="{{ $campaign_detail->id }}">
                    <div class="form-main">
                        <div class="tree-form">
                            <label>To:</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="  Type recipient's name *">
                        </div>
                        <div class="tree-form">
                            <label></label>
                            <input type="text" name="email" class="form-control"
                                placeholder="  Type recipient's email *">
                        </div>
                        <div class="tree-form">
                            <label>From:</label>
                            <input type="text" name="from" class="form-control" placeholder="  Type your name *">
                        </div>
                        <div class="tree-form">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                placeholder="  Type a title - ex: Happy birthday! max. 30 characters *">
                        </div>
                        <div class="tree-form">
                            <label>Message:</label>
                            <textarea name="message" class="form-control"
                                placeholder="Type a message - ex: Enjoy Your Gift! - max. 250 characters *"></textarea>
                        </div>
                        <div class="tree-form">
                            <label>Delivery Date:</label>
                            <input type="date" name="delivery_date" class="form-control" placeholder="">
                        </div>
                        <div class="trand-view">
                            <button type="submit" id="submit_form" class="btn btn-default">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="occasionModal" tabindex="-1" aria-labelledby="occasionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-head">
                        <h2>GIVE THE OCCASION!</h2>
                    </div>
                    {!! Form::open([
                        'id' => 'GIVETHEOCCASION',
                        'route' => 'front.giveTheOccasion',
                        'method' => 'POST',
                    ]) !!}
                    <input type="hidden" name="occassion_campaign_id" value="{{ $campaign_detail->id }}">
                    <div class="form-main">
                        <div class="tree-form">
                            <label>Select:</label>
                            {!! Form::select('occasion', getAllOccasion(), null, [
                                'placeholder' => trans_choice('content.please_select', 1),
                                'id' => 'occasion_select',
                                'class' => 'form-select',
                            ]) !!}
                        </div>
                        <div class="tree-form">
                            <label></label>
                            {!! Form::text('custom_occasion', null, [
                                'placeholder' => 'Or ....',
                                'id' => 'custom_occasion',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <div class="trand-view">
                            <button type="submit" id="submit_occassion_form" class="btn btn-default">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            .gift-accasion a {
                border: 2px #53a92c solid;
            }

            .fa.fa-star.rating_star {
                color: #53a92c;
            }
        </style>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @include('front.capaigns_css')
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Front\GiftTreeRequest', '#GiftTreeFormForm') !!}
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
                    url: "{{ route('front.campaignReview.store') }}",
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
            $('#GIVETHEOCCASION').submit(function(e) {
                e.preventDefault();
                var custom_occasion = $('#custom_occasion').val();
                var occasion_select = $('#occasion_select').val();
                if (custom_occasion || occasion_select) {
                    let formData = new FormData(this);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('front.giveTheOccasion') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#submit_occassion_form').html('Loading...');
                            $('#submit_occassion_form').addClass('disabled');
                            $('#submit_occassion_form').attr('disabled', true);
                        },
                        success: (response) => {
                            if (response.status == 1) {
                                $('#submit_occassion_form').html('Submit');
                                $('#submit_occassion_form').removeClass('disabled');
                                $('#occasionModal').modal('hide');
                            } else {
                                $('#submit_occassion_form').html('Submit');
                                $('#submit_occassion_form').removeClass('disabled');
                                $('#submit_occassion_form').attr('disabled', false);
                            }
                        },
                        error: function() {
                            $('#submit_occassion_form').html('Submit');
                            $('#submit_occassion_form').removeClass('disabled');
                            $('#submit_occassion_form').attr('disabled', false);
                        },
                    });
                } else {
                    return false;
                }
            });
            $('#GiftTreeFormForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('front.submitGirtTree') }}",
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
                            $('#submit_form').html('Submit');
                            $('#submit_form').removeClass('disabled');
                            $('#exampleModal').modal('hide');
                        } else {
                            $('#submit_form').html('Submit');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
                        }
                    },
                    error: function() {
                        $('#submit_form').html('Submit');
                        $('#submit_form').removeClass('disabled');
                        $('#submit_form').attr('disabled', false);
                    },
                });
            });
        </script>
        <script type="text/javascript">
            $('#thumbs img').click(function() {
                $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
                $('#description').html($(this).attr('alt'));
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.navbar-mini .nav-item .nav-main').click(function() {
                    $('.nav-item .nav-main').removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>
        <script>
            $('.changeCampaignVariation').click(function() {
                var combo_id = $(this).attr('data-id');
                var url = `{{ url('/') }}/campaigns/update-campaign-variation/` + combo_id +
                    '/{{ $campaign_detail->id }}';
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                        },
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                    })
                    .done(function(response) {
                        $('#getCampaignTotalAmount').html(`₹${response.total}`);
                    })
                    .fail(function() {
                        console.log('failed');
                    });
            });
            $(document).on("click", ".addToCartBTN", function() {
                var data_id = $(this).attr('data-id');

                var html = ` <span data-id="${data_id}" class="minus cart_decrement">-</span>
                                <input type="text" data-id="${data_id}"
                                    class="only_number cartOrderQtyValue"
                                    id="cart_input${data_id}"
                                    value="1">
                                <span data-id="${data_id}" class="plus cart_increment">+</span>`;
                $('.addToCartBTNDiv' + data_id).html(html);
                var combo_id = $('.nav-main.active.changeNavMain').attr('data-val');
                addOrUpdateToCart(data_id, 1, combo_id);
                $('#gift-accasion-div').removeClass('d-none');
            });
            $(document).on("click", ".cart_decrement", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                var combo_id = $('.nav-main.active.changeNavMain').attr('data-val');
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                if (Number(cart_val) <= 1) {
                    var html = `  <p class="addToCartBTN" data-id="${data_id}"
                                        style="background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px; cursor: pointer;">
                                        Add to Cart</p>`;
                    $('.addToCartBTNDiv' + data_id).html(html);
                } else {
                    total_amt = total_amt * (Number(cart_val) - 1);
                }
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amount${data_id}`).html(total_amt_html);
                $(input_selector).val(Number(cart_val) - 1);
                cart_val = $(input_selector).val();
                var combo_id = $('.nav-main.active.changeNavMain').attr('data-val');
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val, combo_id);
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
                var combo_id = $('.nav-main.active.changeNavMain').attr('data-val');
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val, combo_id);
                }, 2000);
            });

            $(document).on("click", ".cartOrderQtyValue", function() {
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
                var combo_id = $('.nav-main.active.changeNavMain').attr('data-val');
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val, combo_id);
                }, 2000);
            });

            function addOrUpdateToCart(data_id, cart_val, combo_id) {
                var url = `{{ url('/') }}/campaigns/add-or-update-cart/` + data_id;
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                        },
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            qty: cart_val,
                            combo_id: combo_id
                        },
                    })
                    .done(function(response) {
                        console.log('success');
                    })
                    .fail(function() {
                        console.log('failed');
                    });
            }
        </script>

        <script>
            $(document).on("click", ".addToCartBTNLetest", function() {
                var data_id = $(this).attr('data-id');
                var html = ` <span data-id="${data_id}" class="minus cart_decrementLetest">-</span>
                                        <input type="text" data-id="${data_id}"
                                            class="only_number cartOrderQtyValueLetest"
                                            id="cart_inputLetest${data_id}"
                                            value="1">
                                        <span data-id="${data_id}" class="plus cart_incrementLetest">+</span>`;
                $('.addToCartBTNDivLetest' + data_id).html(html);
                addOrUpdateToCartLetest(data_id, 1);
            });
            $(document).on("click", ".cart_decrementLetest", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_inputLetest${data_id}`;
                var cart_val = $(input_selector).val();
                var total_amt = Number($(`#cart_total_amountLetest${data_id}`).attr('data-value'));
                if (Number(cart_val) <= 1) {
                    html = `<p class="addToCartBTNLetest" data-id="${data_id}"
                                                    style="background-color: #53a92c;color: #fff;font-size: 16px;padding: 4px 10px;border-radius: 5px; cursor: pointer;">
                                                    Add to Cart</p>`;
                    $('.addToCartBTNDivLetest' + data_id).html(html);
                } else {
                    total_amt = total_amt * (Number(cart_val) - 1);
                }

                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amountLetest${data_id}`).html(total_amt_html);
                $(input_selector).val(Number(cart_val) - 1);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCartLetest(data_id, cart_val);
                }, 2000);
            });

            $(document).on("click", ".cart_incrementLetest", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_inputLetest${data_id}`;
                var cart_val = $(input_selector).val();
                $(input_selector).val(Number(cart_val) + 1);
                var total_amt = Number($(`#cart_total_amountLetest${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) + 1);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amountLetest${data_id}`).html(total_amt_html);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCartLetest(data_id, cart_val);
                }, 2000);
            });

            $(document).on("click", ".cartOrderQtyValueLetest", function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_inputLetest${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 0) {
                    $(input_selector).val(1);
                    return false;
                }
                var total_amt = Number($(`#cart_total_amountLetest${data_id}`).attr('data-value'));
                total_amt = total_amt * Number(cart_val);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amountLetest${data_id}`).html(total_amt_html);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCartLetest(data_id, cart_val);
                }, 2000);
            });

            function addOrUpdateToCartLetest(data_id, cart_val) {
                var url = `{{ url('/') }}/campaigns/add-or-update-cart/` + data_id;
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
