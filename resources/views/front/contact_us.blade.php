@extends('front.base')
@section('title')
    <title>{{ webSiteTitleName() }} : Contact Us</title>
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
                            <h2>contact info</h2>
                        </div>
                        <!-- .page-title -->
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li>Contact</li>
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
    <section class="bg-contact-us">
        <div class="container">
            <div class="row">
                <div class="contact-us">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="contact-title">Get in Touch</h3>
                            {!! Form::open([
                                'id' => 'DonateUsForm',
                                'class' => 'contact-form',
                                'method' => 'POST',
                            ]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            {!! Form::text('name', null, [ 'placeholder' => 'Full Name*', 'class' => 'form-control']) !!}
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                            {!! Form::text('email', null, [ 'placeholder' => 'Email Address*', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <!-- .col-md-6 -->
                            </div>
                            <!-- .row -->
                            <div class="form-group">
                                    {!! Form::text('subject', null, [ 'placeholder' => 'Subject', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                            <textarea class="form-control text-area" name="message" rows="3" placeholder="Message*"></textarea>
                            </div>
                            <button type="submit" id="submit_form" class="btn btn-default">Submit</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-lg-4">
                            <h3 class="contact-title">Contact Info</h3>
                            <ul class="contact-address">
                                <li>
                                    <i class="flaticon-placeholder"></i>
                                    <div class="contact-content">
                                        <p> {{ getSettingDataBySlug('address') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-vibrating-phone"></i>
                                    <div class="contact-content">
                                        <p>{{ getSettingDataBySlug('contact_number') }}</p>
                                        <p>{{ getSettingDataBySlug('whatsapp_number') != null ? getSettingDataBySlug('whatsapp_number') : '' }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-message"></i>
                                    <div class="contact-content">
                                        <p>{{ getSettingDataBySlug('email') }}</p>
                                    </div>
                                </li>
                            </ul>
                            <!-- .contact-address -->
                            <ul class="social-icon-rounded contact-social-icon">
                                @if (getSettingDataBySlug('facebook_url') != null)
                                    <li><a href="{{ getSettingDataBySlug('facebook_url') }}" target="_blank"><i
                                                class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                @endif
                                @if (getSettingDataBySlug('twitter_url') != null)
                                    <li><a href="{{ getSettingDataBySlug('twitter_url') }}" target="_blank"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                @endif
                                @if (getSettingDataBySlug('instagram_url') != null)
                                    <li><a href="{{ getSettingDataBySlug('instagram_url') }}" target="_blank"><i
                                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                @endif
                                @if (getSettingDataBySlug('linkedin_url') != null)
                                    <li><a href="{{ getSettingDataBySlug('linkedin_url') }}" target="_blank"><i
                                                class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                @endif
                                @if (getSettingDataBySlug('whatsapp_number') != null)
                                    <li><a href="https://wa.me/{{ getSettingDataBySlug('whatsapp_number') }}"
                                            target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .contact-us -->
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
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Front\ContactUsRequest', 'form') !!}
    <script>
        $('#DonateUsForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('front.submitContactUs') }}",
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
                        this.reset();
                        Swal.fire(response.message);

                        $('#submit_form').html('Submit');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
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
    @endpush
@endsection
