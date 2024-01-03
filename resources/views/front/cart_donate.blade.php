@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Donate</title>
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
                            <h2>Donate Page</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Donate</li>
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

    <section class="bg-donate-section"  style="padding:0;">
        <div class="container">
            <div class="row">
                <div class="donate-form">
                    {!! Form::open([
                        'id' => 'DonateForm',
                        'class' => 'contact-form',
                        'method' => 'GET',
                    ]) !!}
                    <div class="select-amount">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <h3>I would like to Give...</h3>
                                    <div class="radio-select col-lg-4">
                                        <input type="radio" name="donation_type" value="one time" id="donate-plan-1"
                                            >
                                        <label for="donate-plan-1">One time</label>
                                    </div>
                                    <div class="radio-select col-lg-4">
                                        <input type="radio" name="donation_type" value="monthly" id="donate-plan-2">
                                        <label for="donate-plan-2">Monthly</label>
                                    </div>
                                    <div class="radio-select col-lg-3">
                                        <input type="radio" name="donation_type" value="annually" id="donate-plan-3" checked>
                                        <label for="donate-plan-3">Annually</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <h3>Total Amount : {{currencyIcon() . totalCartAmount()}}</h3>
                                        <input type="hidden" value="{{totalCartAmount()}}" name="donation_amount">
                                        <input type="hidden" value="{{$order_id}}" name="order_id">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-md-7 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .select-amount -->
                    <div class="information-form">
                        <h3>Address</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">First Name<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="first_name" id="firstName"
                                        placeholder="First Name">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lastName">Last Name<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="last_name" id="lastName"
                                        placeholder="Last Name">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address1">Address 1<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="address_1" id="address1"
                                        placeholder="Address 1">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control mb-2" name="address_2" id="address2"
                                        placeholder="Address 2">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="city">City<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="city" id="city"
                                        placeholder="City">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="state">State<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="state" id="state"
                                        placeholder="State">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="country" id="country"
                                        placeholder="Country">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="zipcode">Zipcode<span>*</span></label>
                                    <input type="text" maxlength="6" class="only_number form-control" name="zipcode"
                                        id="zipcode" placeholder="Zipcode">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="email" id="email"
                                        placeholder="Email">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile<span>*</span></label>
                                    <input type="text" class="form-control mb-2" name="mobile" id="mobile"
                                        placeholder="Mobile">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pan_number">PAN card number</label>
                                    <input type="text" maxlength="10" minlength="10" class="form-control mb-2"
                                        name="pan_number" id="pan_number" placeholder="PAN card number">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name_on_pan">Name on PAN card</label>
                                    <input type="text" class="form-control mb-2" name="name_on_pan" id="name_on_pan"
                                        placeholder="Name on PAN card">
                                </div>
                                <!-- .form-group -->
                            </div>
                            <!-- .col-lg-6 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="how_did_you_about_us">How did you about us</label>
                                    <textarea class="form-control mb-2" name="how_did_you_about_us" id="how_did_you_about_us"
                                        placeholder="How did you about us"></textarea>
                                </div>
                                <!-- .form-group -->
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .paymeny-information -->
                    <button type="submit" id="submit_form" class="btn btn-default">Donate Now</button>
                    {!! Form::close() !!}
                </div>
                <!-- .donate-form -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <section class="bg-donate-section" style="padding:40px 0;">
        <div class="container">
            <div class="gmt-heading text-center">
                <span class="subtitle-gmt">For</span>
                <h2 class="gmthdg-txt mb-4" style="color: #53a92b;">Simple Donations</h2>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 pt-2 pt-sm-3 pt-xl-2">

                <!-- Item -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center  shadow rounded scanUpi-gmt">
                        <div class="d-flex align-items-center"
                            style="width: 50%;padding: 30px;background-color:#53a92b;height:100%;">
                            <h2 class=" h1" style="color: #fff;">Scan to pay via UPI</h2>
                        </div>
                        <div style="width: 50%;text-align:right;" class="gmt-barcode">
                            <img
                                src="{{ isset($global_setting_data['qr_scanner']) ? asset('files/settings/' . $global_setting_data['qr_scanner'] . '') : $logo_img }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-flex align-items-center shadow rounded scanUpi-gmt" style="height: 100%;">
                        <div class="d-flex align-items-center"
                            style="width: 50%;padding: 30px;background-color:#53a92b;height:100%;">
                            <h2 class="h1" style="color: #fff;">Bank Transfer</h2>
                        </div>
                        <div class="bg-white text-dark ps-4 detail-p">
                            <h2 class="hdfc-gmt" style="font-weight: 500;font-size: 26px;">
                                {{ isset($global_setting_data['bank_name']) ? $global_setting_data['bank_name'] : 'Test Bank' }}
                            </h2>
                            <p><b>A/C Number:</b>
                                {{ isset($global_setting_data['ac_number']) ? $global_setting_data['ac_number'] : '00000000' }}
                            </p>
                            <p><b>IFSC Code:</b>
                                {{ isset($global_setting_data['ifsc_code']) ? $global_setting_data['ifsc_code'] : 'Test IFSC' }}
                            </p>
                            <p><b>A/C Payee:</b>
                                {{ isset($global_setting_data['ac_name']) ? $global_setting_data['ac_name'] : 'Test Account' }}
                            </p>
                            <p><b>Branch :</b>
                                {{ isset($global_setting_data['branch']) ? $global_setting_data['branch'] : 'Test Bank' }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    @push('styles')
    <style>
        .scanUpi-gmt {
            height: 320px;
            overflow: hidden;
        }

        .h1 {
            font-size: 46px;
        }

        .detail-p p {
            margin-top: 12px;
        }
    </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Front\DonationRequest', 'form') !!}
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            $('#DonateForm').submit(function(e) {
                var donation_amt = $("#customAmountValueField").val();
                if (Number(donation_amt)) {
                    $('#chooseCustomAmount-error').css('display', 'none');
                } else {
                    if ($('input[name="donation_amount"]:checked').val()) {
                        $('#chooseCustomAmount-error').css('display', 'none');
                    } else {
                        $('#chooseCustomAmount-error').css('display', 'block');
                    }
                }
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('front.donateNow') }}",
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
                            payAmountWithRazorpay(response.data.donation_amount, response.data.donate_id, response
                                .data.pan_name, response.data.email, response.data.mobile_no)
                            $('#submit_form').html('Donate Now');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
                        } else {
                            $('#submit_form').html('Donate Now');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
                        }
                    },
                    error: function() {
                        $('#submit_form').html('Donate Now');
                        $('#submit_form').removeClass('disabled');
                        $('#submit_form').attr('disabled', false);
                    },
                });
            });

            function payAmountWithRazorpay(amount, donate_id, pan_name, email, mobile_no) {
                var total_amount = amount * 100; 
                console.log(total_amount, amount,donate_id);
                var options = {
                    "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
                    "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": "INR",
                    "name": "GreenForest",
                    "description": "Donation Transaction",
                    "image": "{{ asset('front/images/home01/logo.png') }}",
                    "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function(response) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': `{{ csrf_token() }}`
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('front.donationPayment') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount,
                                donation_id: donate_id,
                                payment_json: response,
                            },
                            success: function(data) {
                                Swal.fire('Thanks for donating us');
                                url = `{{url('/')}}`;
                                setTimeout(function() {
                                    $(location).attr('href',url);
                                    }, 2000);
                            }
                        });
                    },
                    "prefill": {
                        "name": pan_name,
                        "email": email,
                        "contact": mobile_no
                    },
                    "notes": {
                        "donate_id" : donate_id,
                    },
                    "theme": {
                        "color": "#218838"
                    }
                };
                var donation = new Razorpay(options);
                donation.open();
            }
        </script>
        <script>
            $('#chooseCustomAmount').click(function() {
                var data_attr = $(this).attr('data-attr');
                var donation_custom_html = ` <div class="radio-select col-lg-6">
                                            <input type="text" id="customAmountValueField" class="form-control only_number" name="donation_amount" value=""
                                            placeholder="Enter your amount">
                                            </div>`;
                var donation_defined_html = ` <div class="radio-select">
                                                <input type="radio" value="100" name="donation_amount" id="amount-1">
                                                <label for="amount-1">{{ currencyIcon() }}100</label>
                                            </div>
                                            <!-- .radio-select -->
                                            <div class="radio-select">
                                                <input type="radio" value="150" name="donation_amount" id="amount-2">
                                                <label for="amount-2">{{ currencyIcon() }}150</label>
                                            </div>
                                            <!-- .radio-select -->
                                            <div class="radio-select">
                                                <input type="radio" value="250" name="donation_amount" id="amount-3">
                                                <label for="amount-3">{{ currencyIcon() }}250</label>
                                            </div>
                                            <!-- .radio-select -->
                                            <div class="radio-select">
                                                <input type="radio" value="350" name="donation_amount" id="amount-4">
                                                <label for="amount-4">{{ currencyIcon() }}350</label>
                                            </div>
                                            <!-- .radio-select -->
                                            <div class="radio-select">
                                                <input type="radio" name="donation_amount" value="500" id="amount-5">
                                                <label for="amount-5">{{ currencyIcon() }}500</label>
                                            </div>`;
                if (data_attr == 'custom') {
                    $('#donationAmountType').html(donation_custom_html);
                    $(this).attr('data-attr', 'defined');
                } else {
                    $('#donationAmountType').html(donation_defined_html);
                    $(this).attr('data-attr', 'custom');
                }

            });
        </script>
    @endpush
@endsection
