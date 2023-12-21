        <!-- End Pre-Loader -->
        <header class="header-style-2">
            <div class="bg-header-top">
                <div class="container">
                    <div class="row">
                        <div class="header-top">
                            <ul class="h-contact">
                                <li><i class="flaticon-time-left"></i> Time : {{getSettingDataBySlug('available_time')}}</li>
                                <li><i class="flaticon-vibrating-phone"></i> Phone : {{getSettingDataBySlug('contact_number')}}</li>
                                <li><i class="flaticon-placeholder"></i> Address :  {{getSettingDataBySlug('address')}}</li>
                            </ul>
                            <div class="donate-option">
                                <a href="donate.html"><i class="fa fa-heart" aria-hidden="true"></i> donate now</a>
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
                                    <a class="navbar-brand" href="index.html"><img
                                            src="{{ asset('front/images/home01/logo.png') }}" alt="logo"
                                            class="img-responsive" /></a>
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
                                                <a href="{{url('/')}}" class="active">HOME</a>
                                            </li>
                                            <li><a href="{{route('front.aboutUs')}}" class="{{ request()->is('*about-us*') ? 'active' : '' }}">About</a></li>
                                            <li>
                                                <a href="{{route('front.services')}}" class="{{ request()->is('*services*') ? 'active' : '' }}">Services</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.projectIndex')}}" class="{{ request()->is('*projects*') ? 'active' : '' }}">Projects</a>
                                            </li>
                                            <li>
                                                <a href="#">pages</a>
                                                <ul class="sub-menu">
                                                    {{-- <li>
                                                        <a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i> Our Team</a>
                                                        <ul class="sub-sub-menu">
                                                            <li><a href="team.html"><i class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Team</a></li>
                                                            <li><a href="team_single.html"><i
                                                                        class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Single Team</a></li>
                                                        </ul>
                                                    </li> --}}
                                                    <li>
                                                        <a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i> Shop</a>
                                                        <ul class="sub-sub-menu">
                                                            <li><a href="shop.html"><i class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Shop</a></li>
                                                            <li><a href="shop_single.html"><i
                                                                        class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Single Shop</a></li>
                                                            <li><a href="shop_cart.html"><i
                                                                        class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Shop Cart</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i> Campaign</a>
                                                        <ul class="sub-sub-menu">
                                                            <li><a href="campaign.html"><i
                                                                        class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Campaign</a></li>
                                                            <li><a href="campaign_single.html"><i
                                                                        class="fa fa-angle-double-right"
                                                                        aria-hidden="true"></i> Single Campaign</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="donate.html"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i> Donate Page</a></li>
                                                    <li><a href="404_page.html"><i class="fa fa-angle-double-right"
                                                                aria-hidden="true"></i> 404 Page</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{route('front.blogs')}}" class="{{ request()->is('*blogs*') ? 'active' : '' }}">Blogs</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.campaigns.index')}}" class="{{ request()->is('*campaigns*') ? 'active' : '' }}">Campaigns</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.gallery')}}" class="{{ request()->is('*gallery*') ? 'active' : '' }}">Gallery</a>
                                            </li>
                                            <li><a href="{{route('front.contactUs')}}" class="{{ request()->is('*contact-us*') ? 'active' : '' }}">contacts</a></li>
                                        </ul>
                                        <div class="menu-right-option pull-right">
                                            <div class="cart-option">
                                                <div class="cart-icon">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <div class="count-cart">2</div>
                                                </div>
                                                <!-- .cart-icon -->
                                                <div class="cart-dropdown-menu">
                                                    <div class="cart-items">
                                                        <div class="cart-img">
                                                            <a href="single_shop_cat.html"><img
                                                                    src="{{ asset('front/images/home01/cart-img-1.jpg') }}"
                                                                    alt="cart-img-1"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="single_shop_cat.html">Product Title Here</a>
                                                            </h6>
                                                            <p>1*<span>$350</span></p>
                                                        </div>
                                                        <div class="cart-btn">
                                                            <a href="#"><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <!-- .cart-items -->

                                                    <div class="cart-items">
                                                        <div class="cart-img">
                                                            <a href="#"><img
                                                                    src="{{ asset('front/images/home01/cart-img-2.jpg') }}"
                                                                    alt="cart-img-2"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="single_shop_cat.html">Product Title Here</a>
                                                            </h6>
                                                            <p>1*<span>$350</span></p>
                                                        </div>
                                                        <div class="cart-btn">
                                                            <a href="#"><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <!-- .cart-items -->
                                                    <div class="cart-items">
                                                        <div class="cart-img">
                                                            <a href="#"><img
                                                                    src="{{ asset('front/images/home01/cart-img-3.jpg') }}"
                                                                    alt="cart-img-3"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="single_shop_cat.html">Product Title Here</a>
                                                            </h6>
                                                            <p>1*<span>$350</span></p>
                                                        </div>
                                                        <div class="cart-btn">
                                                            <a href="#"><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <!-- .cart-items -->
                                                    <div class="total-price">
                                                        <p><span>Total Price :</span> $700 </p>
                                                    </div>
                                                    <!-- .total-prices -->
                                                    <div class="checkout-btn">
                                                        <a href="#" class="btn btn-default">donate now</a>
                                                    </div>
                                                </div>
                                                <!-- .cart--->
                                            </div>
                                            <!-- .cart-option -->

                                            <div class="search-box">
                                                <i class="fa fa-search first_click" aria-hidden="true"
                                                    style="display: block;"></i>
                                                <i class="fa fa-times second_click" aria-hidden="true"
                                                    style="display: none;"></i>
                                            </div>
                                            <div class="search-box-text">
                                                <form action="search">
                                                    <input type="text" name="search" id="all-search"
                                                        placeholder="Search Here">
                                                </form>
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
