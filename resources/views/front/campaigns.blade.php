@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Campaigns</title>
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
                            <h2>ALL CAMPAIGN</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>campaign</li>
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
    <section class="bg-campaing-section">
        <div class="container">
            <div class="row">
                <div class="focus-cause">
                    <div class="row">
                        @foreach ($campaigns as $campaign)
                            @php
                                $raised_percent = ($campaign->raise_amount / $campaign->target_amount) * 100;
                            @endphp
                            <div class="col-md-3 col-xl-3 col-sm-6 col-12 col-lg-3">
                                <div class="list-box">
                                    <div class="img-box">
                                        <img src="{{ $campaign->image }}"
                                            alt="{{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}"
                                            style="width:304px; height:228px;">
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
                                            <a href="#">
                                                {{ isset($campaign->title) ? $campaign->title : 'Campaign Image' }}
                                            </a>
                                        </h6>

                                        <div class="with-cart">
                                            <p class="mb-0" id="cart_total_amount{{ $campaign->id }}"
                                                data-value="{{ $campaign->price }}">Amount
                                                {{ currencyIcon() }}{{ $campaign->price }}</span></p>
                                            <div class="number">
                                                <span data-id="{{ $campaign->id }}" class="minus cart_decrement">-</span>
                                                <input type="text" data-id="{{ $campaign->id }}"
                                                    class="only_number cartOrderQtyValue"
                                                    id="cart_input{{ $campaign->id }}" value="1">
                                                <span data-id="{{ $campaign->id }}" class="plus cart_increment">+</span>
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
                                            <a href="#" data-id="{{ $campaign->id }}">Donate Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $campaigns->links() }}
                    <!-- .row -->
                </div>
                <!-- .focus-cause -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />
        @include('front.capaigns_css')
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
        <script>
            $('.cart_decrement').click(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 1) {
                    return false;
                }
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) - 1);
                var total_amt_html = `Amount {{ currencyIcon() }} ${total_amt}`;
                $(`#cart_total_amount${data_id}`).html(total_amt_html);
                $(input_selector).val(Number(cart_val) - 1);
                cart_val = $(input_selector).val();
                setTimeout(function() {
                    addOrUpdateToCart(data_id, cart_val);
                }, 1000);
            });

            $('.cart_increment').click(function() {
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
                }, 1000);
            });

            $('.cartOrderQtyValue').change(function() {
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
                }, 1000);
            });

            function addOrUpdateToCart(data_id, cart_val) {
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

                    })
                    .fail(function() {
                        Swal.fire('Oops...', 'Something went wrong please refresh pagin and again add!',
                            'error');
                    });
            }
        </script>
    @endpush
@endsection
