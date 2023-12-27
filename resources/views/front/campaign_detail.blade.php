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
                                        Add</p>
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
                            <div class="progress skill-bar ">
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
                            <a href="{{ route('front.cart') }}">Donate now</a>
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
                                            <span>Total Price:
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
                                                    Add</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="cart-btn">
                                        <span>
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
                                        </span>
                                        <a href="{{ route('front.donate') }}" data-id="{{ $campaign->id }}">Donate
                                            Now</a>
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
                        <p>Need help gifting? <a href="#">Click here</a> for our guide!</p>
                    </div>

                    <div class="form-main">
                        <div class="tree-form">
                            <label>To:</label>
                            <input type="name" class="form-control" placeholder="Type recipient's name">
                        </div>
                        <div class="tree-form">
                            <label></label>
                            <input type="name" class="form-control" placeholder="Type recipient's email">
                        </div>
                        <div class="tree-form">
                            <label>From:</label>
                            <input type="name" class="form-control" placeholder="Type your name">
                        </div>
                        <div class="tree-form">
                            <label>Title</label>
                            <input type="name" class="form-control"
                                placeholder="Type a title - ex: Happy birthday! max. 30 characters">
                        </div>
                        <div class="tree-form">
                            <label>Message:</label>
                            <textarea class="form-control" placeholder="Type a message - ex: Enjoy Your Gift! - max. 250 characters"></textarea>
                        </div>
                        <div class="tree-form">
                            <label>Delivery Date:</label>
                            <input type="date" class="form-control" placeholder="">
                        </div>

                        <div class="trand-view">
                            <a href="#">Submit</a>
                        </div>
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
                            <input type="text" id="custom_occasion" class="form-control" placeholder="Or ....">
                        </div>
                        <div class="trand-view">
                            <a href="#">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <style>
            .gift-accasion a {
                border: 2px #53a92c solid;
            }
        </style>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @include('front.capaigns_css')
    @endpush
    @push('scripts')
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
            $('.addToCartBTN').click(function() {
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
                if (Number(cart_val) <= 1) {
                    return false;
                }
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) - 1);
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
            $('.addToCartBTNLetest').click(function() {
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
                if (Number(cart_val) <= 1) {
                    return false;
                }
                var total_amt = Number($(`#cart_total_amountLetest${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) - 1);
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
