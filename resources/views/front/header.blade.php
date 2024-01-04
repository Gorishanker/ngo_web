        <!-- End Pre-Loader -->
        <header class="header-style-2">
            <div class="bg-header-top">
                <div class="container">
                    <div class="row">
                        <div class="header-top">
                            <ul class="h-contact">
                                <li><i class="flaticon-time-left"></i> Time :
                                    {{ getSettingDataBySlug('available_time') }}</li>
                                <li><i class="flaticon-vibrating-phone"></i> Phone :
                                    {{ getSettingDataBySlug('contact_number') }}</li>
                                <li><i class="flaticon-placeholder"></i> Address : {{ getSettingDataBySlug('address') }}
                                </li>
                            </ul>
                            <div class="donate-option">
                                <a href="{{ getSettingDataBySlug('site_mode') == 0 ? '#' : route('front.donate') }}"><i
                                        class="fa fa-heart" aria-hidden="true"></i> donate now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .bg-header-top -->
            <!-- Start Menu -->
            <div class="bg-main-menu menu-scroll">
                <div class="container">
                    <div class="row">
                        <div class="main-menu">
                            <div class="main-menu-bottom">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="{{ url('/') }}"><img
                                            style="max-width:230px; max-height:46px;"
                                            src="{{ isset($global_setting_data['logo']) ? asset('files/settings/' . $global_setting_data['logo'] . '') : $logo_img }}"
                                            alt="logo" class="img-responsive" /></a>
                                    <button type="button" class="navbar-toggler collapsed d-lg-none"
                                        data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1"
                                        aria-controls="bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="navbar-toggler-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="main-menu-area">
                                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                                        <ul>
                                            <li>
                                                <a href="{{ url('/') }}"
                                                    class="{{ request()->is('/') ? 'active' : '' }}">HOME</a>
                                            </li>
                                            <li><a href="{{ route('front.aboutUs') }}"
                                                    class="{{ request()->is('*about-us*') ? 'active' : '' }}">About</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.services') }}"
                                                    class="{{ request()->is('*services*') ? 'active' : '' }}">Services</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.projectIndex') }}"
                                                    class="{{ request()->is('*projects*') ? 'active' : '' }}">Projects</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.products.index') }}"
                                                    class="{{ request()->is('*products*') ? 'active' : '' }}">Products</a>
                                            </li>
                                            {{-- @if (getSettingDataBySlug('site_mode') == 1)
                                                <li>
                                                    <a href="{{route('front.impactStory.index')}}"
                                                        class="{{ request()->is('*impact-stories*') || request()->is('*pricing-policy*') || request()->is('*shipping-policy*') || request()->is('*cancellations-policy*') || request()->is('*privacy-policy*') || request()->is('*terms-and-conditions*') || request()->is('*faqs*') || request()->is('*gallery*') ? 'active' : '' }}">pages</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="{{ route('front.impactStory.index') }}"
                                                                class="{{ request()->is('*impact-stories*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i> Impact Stories</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('front.gallery') }}"
                                                                class="{{ request()->is('*gallery*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Gallery</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('front.faqs') }}"
                                                                class="{{ request()->is('*faqs*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Faq's</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/') }}/terms-and-conditions"
                                                                class="{{ request()->is('*terms-and-conditions*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Terms & Conditions</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/') }}/privacy-policy"
                                                                class="{{ request()->is('*privacy-policy*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Privacy Policy</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/') }}/cancellations-policy"
                                                                class="{{ request()->is('*cancellations-policy*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Cancellation Policy</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/') }}/shipping-policy"
                                                                class="{{ request()->is('*shipping-policy*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Shipping Policy</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/') }}/pricing-policy"
                                                                class="{{ request()->is('*pricing-policy*') ? 'active' : '' }}"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i>Pricing Policy</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif --}}
                                            <li>
                                                <a href="{{ route('front.blogs') }}"
                                                    class="{{ request()->is('*blogs*') ? 'active' : '' }}">Blogs</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.campaigns.index') }}"
                                                    class="{{ request()->is('*campaigns*') ? 'active' : '' }}">Campaigns</a>
                                            </li>

                                            <li><a href="{{ route('front.contactUs') }}"
                                                    class="{{ request()->is('*contact-us*') ? 'active' : '' }}">contacts</a>
                                            </li>
                                        </ul>
                                        <div class="menu-right-option pull-right">
                                            <div class="cart-option">
                                                @if (getSettingDataBySlug('site_mode') == 1)
                                                    <a href="{{ route('front.cart') }}">
                                                        <div class="cart-icon">
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            @if (cartItemCounter() > 0)
                                                                <div class="count-cart">{{ cartItemCounter() }}</div>
                                                            @endif
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- .cart-option -->

                                            <div class="search-box">
                                                <i class="fa fa-search first_click" aria-hidden="true"
                                                    style="display: block;"></i>
                                                <i class="fa fa-times second_click" aria-hidden="true"
                                                    style="display: none;"></i>
                                            </div>
                                        </div>
                                        <!-- .header-search-box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
