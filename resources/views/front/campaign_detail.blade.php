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
    <section class="py-5 image-tab">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-12">
                    <div class="details-left">
                        <div class="productImage">
                            <img id="largeImage" style="width:636px; height: 634px;" src="{{ $campaign_detail->image }}"
                                alt="{{ isset($campaign_detail->title) ? $campaign_detail->title : 'Campaign image' }}">
                        </div>
                        <div id="thumbs">
                            {{-- <img src="img/one.jpg" style="width:110px; height: 100px;" alt="{{isset($campaign_detail->title) ? $campaign_detail->title : 'Campaign image'}}"> --}}
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
                        <p class="mb-0 pay">
                            {{ currencyIcon() }}{{ isset($campaign_detail->order_item->total_amount) ? round($campaign_detail->order_item->total_amount) : $campaign_detail->price }}
                        </p>

                        <div class="tree-select">
                            <label>Select trees for your forest</label>
                            <ul class="navbar-mini">
                                <li class="nav-item"><a href="#"
                                        data-val="0" id="{{ $campaign_detail->order_item->combo == 0 ? 'comboOptionValueCampaign' : '' }}"
                                        class="nav-main {{ $campaign_detail->order_item->combo == 0 ? 'active' : '' }}">1
                                        Tree</a></li>
                                @if (isset($campaign_detail->campaign_combos) && $campaign_detail->campaign_combos->count())
                                    @foreach ($campaign_detail->campaign_combos as $combo)
                                        <li class="nav-item" data-id="{{ $combo->id }}"><a href="#" id="{{ $campaign_detail->order_item->combo_id == $combo->id ? 'comboOptionValueCampaign' : '' }}"
                                                data-val="{{ $combo->id }}"
                                                class="nav-main {{ $campaign_detail->order_item->combo_id == $combo->id ? 'active' : '' }}">{{ $combo->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="number">
                                <span data-id="{{ $campaign_detail->id }}" class="minus cart_decrement">-</span>
                                <input type="text" data-id="{{ $campaign_detail->id }}"
                                    class="only_number cartOrderQtyValue" id="cart_input{{ $campaign_detail->id }}"
                                    value="{{ isset($campaign_detail->order_item->quantity) ? $campaign_detail->order_item->quantity : 1 }}">
                                <span data-id="{{ $campaign_detail->id }}" class="plus cart_increment">+</span>
                            </div>
                        </div>

                        <div class="hint">
                            <p><span>Hint:</span>16 Trees for each Somwar</p>
                            <p>12 Trees for 12 Jyotirlingas</p>
                            <p>108 Trees for 108 names of Shiva</p>
                        </div>

                        <div class="gift-accasion">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-gift"></i> Gift Trees
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#occasionModal">
                                <i class="fa-solid fa-tree"></i> Occasion
                            </a>
                        </div>

                        <div class="add-card">
                            <a href="#">Donate now</a>
                        </div>

                        <div class="acordian-main">
                            <label>What you get ?</label>
                            <button class="accordion">
                                <svg class="icon icon-accordion color-foreground-text" aria-hidden="true" focusable="false"
                                    role="presentation" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M15.9633 5.16568C16.1818 5.33464 16.2219 5.64867 16.0529 5.86709L11.2315 12.1C10.7573 12.7132 10.5 13.4664 10.5 14.2415L10.5 17.728C10.5 18.0041 10.2761 18.228 9.99998 18.228C9.72384 18.228 9.49998 18.0041 9.49998 17.728L9.49997 14.2415C9.49997 13.2449 9.8308 12.2765 10.4406 11.4882L15.2619 5.25525C15.4309 5.03683 15.7449 4.99673 15.9633 5.16568Z">
                                    </path>
                                    <path
                                        d="M4.13656 9.11047C3.94637 9.31067 3.95448 9.62715 4.15469 9.81735L8.41061 13.8605C9.10616 14.5213 9.49997 15.4386 9.49997 16.398V19.5C9.49997 19.7761 9.72383 20 9.99997 20C10.2761 20 10.5 19.7761 10.5 19.5V16.398C10.5 15.1645 9.99364 13.9851 9.09936 13.1355L4.84344 9.09235C4.64324 8.90216 4.32676 8.91027 4.13656 9.11047Z">
                                    </path>
                                    <path
                                        d="M18.3779 1.53927C18.4327 2.29021 18.4725 3.32703 18.4047 4.40738C18.3125 5.87411 18.0299 7.25745 17.4545 8.14562C16.7167 9.28439 15.6883 9.90008 14.7112 10.1459C13.6919 10.4023 12.8474 10.2333 12.4595 9.98203C11.6151 9.43502 10.6657 7.26257 12.1639 4.95007C12.7171 4.09609 13.9498 3.29603 15.4075 2.63437C16.4929 2.1417 17.5917 1.77412 18.3779 1.53927ZM18.7295 0.399095C19.0125 0.322287 19.2884 0.513872 19.3179 0.805582C19.4683 2.2906 19.735 6.46465 18.2937 8.68934C16.5205 11.4265 13.2903 11.7118 11.9158 10.8213C10.5413 9.93084 9.57124 7.11282 11.3246 4.40636C12.7665 2.18066 17.2 0.814295 18.7295 0.399095Z"
                                        fill-rule="evenodd"></path>
                                    <path
                                        d="M1.16197 6.23639C1.24915 6.80305 1.38541 7.51404 1.5922 8.22877C1.89834 9.28691 2.31835 10.2055 2.84189 10.729C3.54804 11.4352 4.37904 11.7175 5.11404 11.7439C5.89258 11.7719 6.44282 11.5154 6.64245 11.3158C7.09947 10.8588 7.49486 9.18578 6.0474 7.73833C5.55144 7.24237 4.58274 6.85006 3.40831 6.58298C2.60103 6.3994 1.79173 6.29511 1.16197 6.23639ZM0.569611 5.18777C0.276949 5.16998 0.0467941 5.41364 0.080866 5.70486C0.226586 6.95034 0.719124 10.0205 2.13478 11.4362C3.93434 13.2357 6.44588 12.9266 7.34955 12.0229C8.25323 11.1193 8.53389 8.8106 6.75451 7.03122C5.33581 5.61253 1.90298 5.26882 0.569611 5.18777Z"
                                        fill-rule="evenodd"></path>
                                </svg>

                                Tree(s) Plantation
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Whether you need a wordpress website, a shopify site, or a custom fullstack application,
                                    we got you! No matter what kind of website or application you need, it will be made with
                                    clean and maintable code that follows modern development standards. We also have top
                                    notch designers that can make unique designs that will make your website look different
                                    and unique. Not to mention that we also provide 24/7 website maintenance so that you get
                                    all the support you need.
                                </p>
                            </div>

                            <button class="accordion" style="border-bottom: 1px solid #eeeeee;">
                                <svg class="icon icon-accordion color-foreground-text" aria-hidden="true" focusable="false"
                                    role="presentation" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M6.31104 9.13574C6.31104 8.99767 6.42296 8.88574 6.56104 8.88574H13.7464C13.8844 8.88574 13.9964 8.99767 13.9964 9.13574C13.9964 9.27381 13.8844 9.38574 13.7464 9.38574H6.56104C6.42296 9.38574 6.31104 9.27381 6.31104 9.13574Z">
                                    </path>
                                    <path
                                        d="M6.31104 14.0544C6.31104 13.9164 6.42296 13.8044 6.56104 13.8044H13.439C13.577 13.8044 13.689 13.9164 13.689 14.0544C13.689 14.1925 13.577 14.3044 13.439 14.3044H6.56104C6.42296 14.3044 6.31104 14.1925 6.31104 14.0544Z">
                                    </path>
                                    <path
                                        d="M6.92587 11.5952C6.92587 11.4571 7.0378 11.3452 7.17587 11.3452H12.8241C12.9622 11.3452 13.0741 11.4571 13.0741 11.5952C13.0741 11.7333 12.9622 11.8452 12.8241 11.8452H7.17587C7.0378 11.8452 6.92587 11.7333 6.92587 11.5952Z">
                                    </path>
                                    <path
                                        d="M5.19623 1.77832C5.19623 0.949892 5.8678 0.27832 6.69623 0.27832H13.3038C14.1322 0.27832 14.8038 0.949893 14.8038 1.77832V3.46728C14.8038 4.29571 14.1322 4.96728 13.3038 4.96728H6.69623C5.8678 4.96728 5.19623 4.29571 5.19623 3.46728V1.77832ZM6.69623 1.27832C6.42009 1.27832 6.19623 1.50218 6.19623 1.77832V3.46728C6.19623 3.74342 6.42009 3.96728 6.69623 3.96728H13.3038C13.5799 3.96728 13.8038 3.74342 13.8038 3.46728V1.77832C13.8038 1.50218 13.5799 1.27832 13.3038 1.27832H6.69623Z">
                                    </path>
                                    <path
                                        d="M3.73691 2.50806V18.7232H16.2631V2.50806H14.4981V1.50806H16.2631C16.8154 1.50806 17.2631 1.95577 17.2631 2.50806V18.7232C17.2631 19.2755 16.8154 19.7232 16.2631 19.7232H3.73691C3.18462 19.7232 2.73691 19.2755 2.73691 18.7232V2.50806C2.73691 1.95577 3.18462 1.50806 3.73691 1.50806H5.75974V2.50806L3.73691 2.50806Z">
                                    </path>
                                </svg>

                                e-Greeting Card of Tree(s) Plantation for Gifting
                            </button>
                            <div class="accordion-content">
                                <p>
                                    We believe that in order to have a successful website, you need to constantly adjust and
                                    adapt to the data provided by your website visitors. Here at Pierre Web Development, we
                                    have narrowed down the specific key performance indicators that will dramatically boost
                                    your success with connecting to target markets. We will provide a basic metric dashboard
                                    based on how much traffic your site gets, detailed analytical reports that show which
                                    parts of your website is the most popular among visitors as well as access to tools you
                                    can use to make meaningful decisions based on this data.
                                </p>
                            </div>

                            <p class="acor-down">
                                If you want to gift these tree(s) to your loved ones, You can generate an e-Greeting card
                                for tree(s) plantation by logging into "My Account" after placing order.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="discription">
                    <h3>Description:</h3>
                    <p class="all-peragraph">Planting trees during the month of Shravan, also known as Shravan Maas or
                        Sawan, is considered auspicious and is associated with Lord Shiva in Hinduism. Shravan Maas is
                        dedicated to Lord Shiva, and it is believed to be a sacred month during which devotees observe
                        various religious practices and rituals to seek his blessings.</p>
                </div>
            </div>

            <div class="trending-today">
                <h3>Trending Today</h3>
                <div class="row">
                    <div class="col-md-6 col-xl-3 col-sm-6 col-12 col-lg-3">
                        <div class="list-box">
                            <div class="img-box">
                                <a href="#" class="hover-switch">
                                    <img src="img/one.jpg" width="100%" height="100%">
                                    <img src="img/lord-shiva.webp" width="100%" height="100%">
                                </a>
                            </div>
                            <div class="details-box">
                                <h6>
                                    <a href="#">
                                        Tree Planting for Lord Shiva during Shravan Maas
                                    </a>
                                </h6>
                                <span><img src="img/star.png"> (13)</span>
                                <div class="with-cart">
                                    <p class="mb-0">From $ 199</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 col-sm-6 col-12 col-lg-3">
                        <div class="list-box">
                            <div class="img-box">
                                <a href="#" class="hover-switch">
                                    <img src="img/one.jpg" width="100%" height="100%">
                                    <img src="img/lord-shiva.webp" width="100%" height="100%">
                                </a>
                            </div>
                            <div class="details-box">
                                <h6>
                                    <a href="#">
                                        Tree Planting for Lord Shiva during Shravan Maas
                                    </a>
                                </h6>
                                <span><img src="img/star.png"> (13)</span>
                                <div class="with-cart">
                                    <p class="mb-0">From $ 199</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 col-sm-6 col-12 col-lg-3">
                        <div class="list-box">
                            <div class="img-box">
                                <a href="#" class="hover-switch">
                                    <img src="img/one.jpg" width="100%" height="100%">
                                    <img src="img/lord-shiva.webp" width="100%" height="100%">
                                </a>
                            </div>
                            <div class="details-box">
                                <h6>
                                    <a href="#">
                                        Tree Planting for Lord Shiva during Shravan Maas
                                    </a>
                                </h6>
                                <span><img src="img/star.png"> (13)</span>
                                <div class="with-cart">
                                    <p class="mb-0">From $ 199</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 col-sm-6 col-12 col-lg-3">
                        <div class="list-box">
                            <div class="img-box">
                                <a href="#" class="hover-switch">
                                    <img src="img/one.jpg" width="100%" height="100%">
                                    <img src="img/lord-shiva.webp" width="100%" height="100%">
                                </a>
                            </div>
                            <div class="details-box">
                                <h6>
                                    <a href="#">
                                        Tree Planting for Lord Shiva during Shravan Maas
                                    </a>
                                </h6>
                                <span><img src="img/star.png"> (13)</span>
                                <div class="with-cart">
                                    <p class="mb-0">From $ 199</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="trand-view">
                    <a href="#">View All</a>
                </div>
            </div>

            <div class="scope">
                <h3>Scope:</h3>
                <ul>
                    <li class="all-peragraph">Enhancement of Biodiversity</li>
                    <li class="all-peragraph">Increase in Green Cover</li>
                    <li class="all-peragraph">Reduction of Man-Animal Conflict</li>
                    <li class="all-peragraph">Generation of Rural Employment</li>
                    <li class="all-peragraph">Improvement of Wildlife Habitats </li>
                </ul>
            </div>

            <div class="tree-species">
                <h3>Tree Species:</h3>
                <p class="all-peragraph">The species of trees that are planted depend on the project, and they are chosen
                    based on their native habitat in the corresponding ecological zone.</p>
            </div>

            <div class="why-trees">
                <h3>Why trees?</h3>
                <p class="all-peragraph">There are several reasons why planting trees for Lord Shiva during Shravan Maas is
                    considered significant:</p>
                <ul>
                    <li><span>Environmental Stewardship:</span> Lord Shiva is often associated with nature and the
                        preservation of the environment. Planting trees is seen as a way to honor and show respect to the
                        divine presence of Lord Shiva in all living beings and the natural world. It emphasizes the
                        importance of environmental stewardship and the need to protect and conserve the Earth.</li>
                    <li><span>Symbolism of Trees:</span> Trees hold immense symbolism in Hinduism. They represent fertility,
                        longevity, and the interconnectedness of all life forms. Planting trees is believed to bring
                        prosperity, positive energy, and blessings. It is seen as a way to create a harmonious environment
                        that fosters spiritual growth and well-being.</li>
                    <li><span>Spiritual Significance:</span> Planting trees during Shravan Maas is considered a virtuous act
                        that earns spiritual merit (punya). It is believed that performing such acts of devotion during this
                        sacred month pleases Lord Shiva and brings devotees closer to attaining moksha (liberation).
                        Planting trees is seen as a selfless service to both nature and society.</li>
                    <li><span>Seasonal Relevance:</span> Shravan Maas typically falls during the monsoon season in India,
                        which is a favorable time for tree plantation. The ample rainfall during this period helps trees
                        establish their roots and grow effectively. By planting trees during this time, there is a higher
                        chance of their survival and growth.</li>
                </ul>
                <p class="all-peragraph">
                    Overall, planting trees for Lord Shiva during Shravan Maas is a way for devotees to express their
                    reverence, care for the environment, and seek spiritual growth. It combines religious devotion with
                    environmental consciousness, emphasizing the importance of living in harmony with nature.
                </p>
            </div>

            <div class="social-impact">
                <h3>Social Impact:</h3>
                <p class="all-peragraph">Tree planting for Lord Shiva during Shravan Maas can have several positive social
                    impacts:</p>
                <ul>
                    <li><span>Environmental Conservation:</span> Tree planting initiatives contribute to environmental
                        conservation efforts. Trees help combat climate change by absorbing carbon dioxide and releasing
                        oxygen, thus mitigating the effects of greenhouse gases. They also provide shade, prevent soil
                        erosion, and support biodiversity by providing habitats for various species. By planting trees,
                        communities can actively participate in preserving and improving the environment, creating a
                        positive impact on the ecosystem.</li>
                    <li><span>Community Engagement:</span> Tree planting events during Shravan Maas provide an opportunity
                        for communities to come together and engage in a collective effort. People from different
                        backgrounds and age groups can join hands to plant trees, fostering a sense of unity, cooperation,
                        and shared responsibility. These events can strengthen community bonds and create a platform for
                        social interaction and collaboration.</li>
                    <li><span>Education and Awareness:</span> Tree planting initiatives during Shravan Maas can serve as a
                        means to educate and raise awareness about the importance of environmental conservation and
                        sustainable practices. By involving individuals in the process of tree planting, it provides an
                        experiential learning opportunity for people to understand the benefits of trees, their role in the
                        ecosystem, and the need to protect and nurture them. This can inspire a sense of environmental
                        consciousness and motivate individuals to adopt sustainable practices in their daily lives.</li>
                    <li><span>Health and Well-being:</span> Planting trees can have positive effects on human health and
                        well-being. Trees help improve air quality by filtering pollutants and providing fresh oxygen. They
                        also contribute to the overall aesthetics of an area, creating a visually pleasing and calming
                        environment. Engaging in tree planting activities during Shravan Maas can offer individuals a chance
                        to connect with nature, experience its therapeutic benefits, and promote a healthier lifestyle.</li>
                    <li><span>Legacy and Long-Term Impact:</span> Tree planting is a long-term investment in the future. The
                        trees planted during Shravan Maas have the potential to grow and thrive, providing benefits for
                        generations to come. They can create a green legacy and serve as a reminder of the collective
                        efforts made by communities during this auspicious month. The impact of these trees can extend
                        beyond the immediate time frame, providing shade, beauty, and environmental benefits for years to
                        come.</li>
                </ul>
                <p class="all-peragraph">
                    In summary, tree planting for Lord Shiva during Shravan Maas not only has environmental significance but
                    also carries social benefits. It fosters community engagement, promotes environmental education and
                    awareness, enhances health and well-being, and leaves a lasting legacy of environmental conservation.
                </p>
            </div>

            <div class="create-forest">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                        <div class="left-forest">
                            <h3>Create Your Forest</h3>
                            <p>How to create a Forest?</p>
                            <p>One tree at a time.</p>
                            <ul>
                                <li>You can create your own forest by planting trees with your family and friends on every
                                    important event or milestone in your life.</li>
                                <li>You can plant a tree on your birthday, anniversary, promotion</li>
                                <li>You can plant a tree on festivals like Diwali, Christmas, Eid and New Year to wish your
                                    friends and family</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                        <div class="forest-right-img">
                            <img src="img/forest.webp" width="100%" height="100%">
                        </div>
                    </div>
                </div>
            </div>


            <div class="impact-tree">
                <div class="container">
                    <h3>Create Your Forest</h3>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                            <div class="releases-oxygen">
                                <h5>Releases Oxygen</h5>
                                <p>A mature tree produces around 120 kilograms of oxygen per year, which is sufficient for
                                    one human per year.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                            <div class="releases-oxygen">
                                <h5>Reduces Air Pollution</h5>
                                <p>A tree absorbs harmful gases like CO2, NO2 released by factories and vehicles, which can
                                    have serious health problems for us</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                            <div class="releases-oxygen">
                                <h5>Removes CO2</h5>
                                <p>A Tree removes 22 KGs of CO2 from atmosphere per year, which is equivalent to the CO2
                                    realeased by a human in 10 days.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                            <div class="releases-oxygen">
                                <h5>Cooling Effect</h5>
                                <p>A Tree generates cooling effect of around 10 room size ACs by providing shade and through
                                    a process of transpiration.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p class="mb-0">Scroll to the right of the carousel below to select from more card options.</p>
                    </div>
                    <div class="form-main">
                        <div class="tree-form">
                            <label>Select:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="tree-form">
                            <label></label>
                            <input type="name" class="form-control" placeholder="To welcome">
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
        .gift-accasion a{
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

        <script type="text/javascript">
            const accordionBtns = document.querySelectorAll(".accordion");

            accordionBtns.forEach((accordion) => {
                accordion.onclick = function() {
                    this.classList.toggle("is-open");

                    let content = this.nextElementSibling;
                    console.log(content);

                    if (content.style.maxHeight) {
                        //this is if the accordion is open
                        content.style.maxHeight = null;
                    } else {
                        //if the accordion is currently closed
                        content.style.maxHeight = content.scrollHeight + "px";
                        console.log(content.style.maxHeight);
                    }
                };
            });
        </script>

        <script>
            $('.cart_decrement').click(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                if (Number(cart_val) <= 1) {
                    return false;
                }
                $(input_selector).val(Number(cart_val) - 1);
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) - 1);
                cart_val = $(input_selector).val();
                var combo_val = $('#comboOptionValueCampaign').attr('data-val');
                if(Number(combo_val) <= 0){
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val);
                  }, 2000);
                }else{
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val, Number(combo_val));
                  }, 2000);
                }
            });

            $('.cart_increment').click(function() {
                var data_id = $(this).attr('data-id');
                var input_selector = `#cart_input${data_id}`;
                var cart_val = $(input_selector).val();
                $(input_selector).val(Number(cart_val) + 1);
                var total_amt = Number($(`#cart_total_amount${data_id}`).attr('data-value'));
                total_amt = total_amt * (Number(cart_val) + 1);
                cart_val = $(input_selector).val();
                var combo_val = $('#comboOptionValueCampaign').attr('data-val');
                if(Number(combo_val) <= 0){
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val);
                  }, 2000);
                }else{
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val, Number(combo_val));
                  }, 2000);
                }
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
                cart_val = $(input_selector).val();
                var combo_val = $('#comboOptionValueCampaign').attr('data-val');
                if(Number(combo_val) <= 0){
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val);
                  }, 2000);
                }else{
                  setTimeout(function() {
                      addOrUpdateToCart(data_id, cart_val, Number(combo_val));
                  }, 2000);
                }
            });

            function addOrUpdateToCart(data_id, cart_val, combo = null) {
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
                            combo_id: combo,
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
    @endpush
@endsection
