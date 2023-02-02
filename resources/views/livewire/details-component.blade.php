<div>

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>detail</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">

                                    <li
                                        data-thumb="{{ asset('assets/images/products') }}/{{ $product_details->image }}">
                                        <img src="{{ asset('assets/images/products') }}/{{ $product_details->image }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_17.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_15.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_15.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_2.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_2.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_8.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_8.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_10.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_10.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_12.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_12.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                    <li data-thumb="{{ asset('assets/images/products/digital_14.jpg') }}">
                                        <img src="{{ asset('assets/images/products/digital_14.jpg') }}"
                                            alt="product thumbnail" />
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="detail-info">
                            <div class="product-rating">
                                @foreach ($product_details->orderItems->where('rstatus', 1) as $item)
                                    @php
                                        $average = 0;
                                        $average = $average + $item->review->rating;
                                    @endphp
                                @endforeach
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $average)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star " style=" color: #e6e6e6;" aria-hidden="true"></i>
                                    @endif
                                @endfor


                                <a href="#" class="count-review">({{ $count_order_items }} review)</a>
                            </div>
                            <h2 class="product-name">{{ $product_details->name }}</h2>
                            <div class="short-desc">
                                <ul>
                                    <li>{{ $product_details->short_description }}</li>

                                </ul>
                            </div>
                            <div class="wrap-social">
                                <a class="link-socail" href="#"><img
                                        src="{{ asset('assets/images/social-list.png') }}" alt=""></a>
                            </div>
                            @if ($product_details->sale_price > 0)
                                <div class="wrap-price">
                                    <span class="product-price">${{ $product_details->sale_price }}</span>
                                    <del> <span
                                            class="product-price regular-price">${{ $product_details->regular_price }}</span></del>
                                </div>
                            @else
                                <div class="wrap-price"><span
                                        class="product-price">${{ $product_details->regular_price }}</span></div>
                            @endif

                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{ $product_details->stock_status }}</b></p>
                            </div>
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="1" data-max="120"
                                        pattern="[0-9]*">

                                    <a class="btn btn-reduce" href="#"></a>
                                    <a class="btn btn-increase" href="#"></a>
                                </div>
                            </div>
                            <div class="wrap-butons">
                                <a href="#" class="btn add-to-cart">Add to Cart</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
                            </div>
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no
                                        qui, a t everti meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne
                                        cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis
                                        torquatos cum ei.</p>
                                    <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut,
                                        legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his,
                                        ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an
                                        nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum
                                        euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit,
                                        modus taria . </p>
                                    <p>experian soleat maluisset per. Has eu idque similique, et blandit scriptorem
                                        tatibus mea. Vis quaeque ocurreret ea.cu bus scripserit, modus voluptaria ex
                                        per.</p>
                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                            <tr>
                                                <th>Weight</th>
                                                <td class="product_weight">1 kg</td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th>
                                                <td class="product_dimensions">12 x 15 x 23 cm</td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <p>Black, Blue, Grey, Violet, Yellow</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{ $count_order_items }} review
                                                for <span>{{ $product_details->name }}</span></h2>
                                            <ol class="commentlist">
                                                @foreach ($product_details->orderItems->where('rstatus', 1) as $orderDetail)
                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                        id="li-comment-20">
                                                        <div id="comment-20" class="comment_container">
                                                            <img alt=""
                                                                src="{{ asset('assets/images/author-avata.jpg') }}"
                                                                height="80" width="80">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <style>
                                                                        .width-0-percent {
                                                                            width: 0%;
                                                                        }

                                                                        .width-20-percent {
                                                                            width: 20%;
                                                                        }

                                                                        .width--40-percent {
                                                                            width: 40%;
                                                                        }

                                                                        .width-80-percent {
                                                                            width: 80%;
                                                                        }

                                                                        .width-100-percent {
                                                                            width: 100%;
                                                                        }
                                                                    </style>
                                                                    <span
                                                                        class="width-{{ $orderDetail->review->rating * 20 }}-percent">Rated
                                                                        <strong
                                                                            class="rating">{{ $orderDetail->review->rating }}</strong>
                                                                        out of
                                                                        5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong
                                                                        class="woocommerce-review__author">{{ $orderDetail->order }}</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                        datetime="2008-02-14 20:00">
                                                                        {{ \Carbon\Carbon::parse($orderDetail->review->created_at)->format('Y-m-d h:i:s') }}</time>
                                                                </p>
                                                                <p>{{ $orderDetail->review->comment }}</p>

                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div><!-- #comments -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/digital_18.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/digital_20.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Related Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--End wrap-products-->
                    </div>
                </div>

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
</div>
