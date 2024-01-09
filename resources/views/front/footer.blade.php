<!-- Start Footer Section -->
<footer>
    <div class="bg-footer-top" style="padding-bottom: 0px;">
        <div class="container">
            <div class="widgets-title">
                <h3>Contact us</h3>
            </div>
            <div class="row">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer-widgets">
                                <!-- .widgets-title -->
                                <div class="widgets-content">
                                    <p>{{ getSettingDataBySlug('contact_us_text') }}</p>
                                </div>
                                <!-- .widgets-content -->
                                <div class="address-box">
                                    <ul class="address">
                                        <li>
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>{{ getSettingDataBySlug('address') }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>{{ getSettingDataBySlug('contact_number') }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span>{{ getSettingDataBySlug('email') }}</span>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .address -->

                        <!-- .col-lg-3 -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer-widgets">
                                <!-- .widgets-title -->
                                <div class="footer-instagram">
                                    @foreach (getGalleryImages() as $photo)
                                        <a href="{{ $photo->file }}"><img style="width: 80px; height: 70px;"
                                                src="{{ isset($photo->file) ? $photo->file : asset('front/images/event/photo-gallery-small-img-1.jpg') }}"
                                                alt="{{ isset($photo->category->category_name) ? $photo->category->category_name : 'Gallery image' }}"></a>
                                    @endforeach
                                </div>
                                <!-- .footer-instagram -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer-widgets">
                                <ul class="address">
                                    <li>
                                        <a href="{{ route('front.impactStory.index') }}"
                                            class="{{ request()->is('*impact-stories*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Impact
                                            Stories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.gallery') }}"
                                            class="{{ request()->is('*gallery*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Gallery</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.faqs') }}"
                                            class="{{ request()->is('*faqs*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>FAQ's</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}/terms-and-conditions"
                                            class="{{ request()->is('*terms-and-conditions*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Terms &
                                            Conditions</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer-widgets">
                                <ul class="address">
                                    <li>
                                        <a href="{{ url('/') }}/privacy-policy"
                                            class="{{ request()->is('*privacy-policy*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Privacy
                                            Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}/cancellations-policy"
                                            class="{{ request()->is('*cancellations-policy*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Cancellation
                                            Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}/shipping-policy"
                                            class="{{ request()->is('*shipping-policy*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Shipping
                                            Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}/pricing-policy"
                                            class="{{ request()->is('*pricing-policy*') ? 'active_footer_pages_link' : '' }}"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Pricing
                                            Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .footer-top -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-footer-top -->

        <div class="bg-footer-bottom" style="margin-top: 30px;">
            <div class="container">
                <div class="row">
                    <div class="footer-bottom">
                        <div class="copyright-txt">
                            @if (getSettingDataBySlug('copyright_text') != null)
                                <p>{{ getSettingDataBySlug('copyright_text') }}</p>
                            @endif
                        </div>
                        <!-- .copyright-txt -->
                        <div class="social-box">
                            <ul class="social-icon-rounded">
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
                        <!-- .social-box -->

                    </div>
                    <!-- .footer-bottom -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-footer-bottom -->

</footer>
<!-- End Footer Section -->


<!-- Start Scrolling -->
<div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
<!-- End Scrolling -->
