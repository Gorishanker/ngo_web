@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Cart</title>
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
                            <h2>cart page</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>cart</li>
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
    <section class="bg-product-cart-option">
        <div class="container">
            <div class="row">
                <div class="product-cart-option">
                    <div class="table-box">
                        <table class="cart-products-table">
                            <thead>
                                <tr>
                                    <th class="cart-product">Cause</th>
                                    <th class="cart-price">Price</th>
                                    <th class="cart-quantity">Quantity</th>
                                    <th class="cart-total">Total</th>
                                    <th class="cart-edit" style="padding-right:20px;">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($items))
                                    @foreach ($items as $item)
                                        @if (isset($item->product_id))
                                            <tr>
                                                <td class="cart-product">
                                                    <div class="product-cart-img">
                                                        <a href="{{route('front.product.show', $item->product->slug)}}"><img style="width: 85px; height: 85px;"
                                                                src="{{ isset($item->product->image) ? $item->product->image : 'Na' }}"
                                                                alt="{{ isset($item->product->title) ? $item->product->title : 'Na' }}"></a>
                                                    </div>
                                                    <!-- .product-cart-img -->
                                                    <div class="product-cart-title">
                                                        <h4><a
                                                                href="{{route('front.product.show', $item->product->slug)}}">{{ isset($item->product->title) ? $item->product->title : 'Na' }}</a>
                                                        </h4>
                                                    </div>
                                                    <!-- .product-cart-title -->
                                                </td>
                                                <td class="cart-price">
                                                    {{ isset($item->price) ? currencyIcon() . $item->price : 'Na' }}</td>
                                                <td class="cart-quantity">
                                                    <div class="product-counter-option">
                                                        <div class="product-count">
                                                            <!-- .product-count -->
                                                            <input type="submit" data-id="{{ $item->id }}"
                                                                class="cart_decrement" value="-">
                                                            <input type="text" data-id="{{ $item->id }}"
                                                                class="only_number cartOrderQtyValue"
                                                                id="cart_input{{ $item->id }}"
                                                                value="{{ isset($item->quantity) ? $item->quantity : 1 }}">
                                                            <input data-id="{{ $item->id }}" class="cart_increment"
                                                                type="submit" value="+">

                                                        </div>
                                                </td>
                                                <td class="cart-total">
                                                    {{ isset($item->total_amount) ? currencyIcon() . $item->total_amount : 'Na' }}
                                                </td>
                                                <td class="cart-edit">
                                                   <a><i item-id="{{ $item->id }}"
                                                            class="deleteCartitem fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="cart-product">
                                                    <div class="product-cart-img">
                                                        <a href="{{route('front.campaign.show', $item->campaign->slug)}}"><img style="width: 85px; height: 85px;"
                                                                src="{{ isset($item->campaign->image) ? $item->campaign->image : 'Na' }}"
                                                                alt="{{ isset($item->campaign->title) ? $item->campaign->title : 'Na' }}"></a>
                                                    </div>
                                                    <!-- .product-cart-img -->
                                                    <div class="product-cart-title">
                                                        <h4><a
                                                                href="{{route('front.campaign.show', $item->campaign->slug)}}">{{ isset($item->campaign->title) ? $item->campaign->title : 'Na' }}</a>
                                                        </h4>
                                                    </div>
                                                    <!-- .product-cart-title -->
                                                </td>
                                                <td class="cart-price">
                                                    {{ isset($item->price) ? currencyIcon() . $item->price : 'Na' }}</td>
                                                <td class="cart-quantity">
                                                    <div class="product-counter-option">
                                                        <div class="product-count">
                                                            <!-- .product-count -->
                                                            <input type="submit" data-id="{{ $item->id }}"
                                                                class="cart_decrement" value="-">
                                                            <input type="text" data-id="{{ $item->id }}"
                                                                class="only_number cartOrderQtyValue"
                                                                id="cart_input{{ $item->id }}"
                                                                value="{{ isset($item->quantity) ? $item->quantity : 1 }}">
                                                            <input data-id="{{ $item->id }}" class="cart_increment"
                                                                type="submit" value="+">

                                                        </div>
                                                </td>
                                                <td class="cart-total">
                                                    {{ isset($item->total_amount) ? currencyIcon() . $item->total_amount : 'Na' }}
                                                </td>
                                                <td class="cart-edit">
                                                    <a><i item-id="{{ $item->id }}"
                                                            class="deleteCartitem fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="padding-left: 20px;">Cart Item Not Found Please add item
                                            first. <a href="{{ url('/') }}">Go to home</a></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- .table-box -->

                    @if (isset($items))
                        <div class="cart-checked-box">
                            <div class="cart-coupon-code">
                                <h4>Total Amount : {{ currencyIcon() . $total_amount }}</h4>
                            </div>

                            <div class="cart-update">
                                <a href="{{ route('front.cartCheckout') }}">
                                    <button type="submit">proceed checkout</button></a>
                            </div>
                            <!-- .coupon-code -->
                        </div>
                    @endif
                    <!-- .cart-checked-box -->
                </div>
                <!-- .product-cart-option -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
        <script>
            $('.cart_decrement').click(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 1) {
                    $(input_selector).val(1);
                    return false;
                } else {
                    $(input_selector).val(Number(cart_val) - 1);
                    cart_val = $(input_selector).val();
                    UpdateToCart(data_id, cart_val);
                }
            });

            $('.cart_increment').click(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                $(input_selector).val(Number(cart_val) + 1);
                cart_val = $(input_selector).val();
                UpdateToCart(data_id, cart_val);
            });

            $('.cartOrderQtyValue').change(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 0) {
                    $(input_selector).val(1);
                }
                cart_val = $(input_selector).val();
                UpdateToCart(data_id, cart_val);
            });

            function UpdateToCart(data_id, cart_val) {
                var url = `{{ url('/') }}/cart/update-cart/` + data_id;
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
                        location.reload();
                    })
                    .fail(function() {
                        console.log('failed');
                    });
            }
        </script>
        <script>
            $('.deleteCartitem').click(function() {
                var item_id = $(this).attr('item-id');
                var url = `{{ url('/') }}/cart/delete-item/` + item_id;
                deleteCartItem(url);
            });

            function deleteCartItem(url) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                                    },
                                    url: url,
                                    type: 'DELETE',
                                    dataType: 'json'
                                })
                                .done(function(response) {
                                    Swal.fire('Deleted!', 'Your cart item has been deleted',
                                        'success');
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                                })
                                .fail(function() {
                                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                                });
                        });
                    },
                    allowOutsideClick: false
                });
            }
        </script>
    @endpush
@endsection
