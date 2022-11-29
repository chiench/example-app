<div>
    <main id="main" class="main-site">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('Home') }}" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('success-remove'))
                <div class="alert alert-danger" role="alert">
                    {{ session('success-remove') }}
                </div>
            @endif
            <div class=" main-content-area">
                @if (Cart::instance('cart')->count() > 0)
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach ($products as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="assets/images/products/{{ $item->model->image }}"
                                                alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="#">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">${{ $item->model->regular_price }}</p>
                                    </div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{ $item->qty }}"
                                                data-max="120" pattern="[0-9]*">
                                            <a class="btn btn-increase"
                                                wire:click.prevent="addqty('{{ $item->rowId }}')" href="#"></a>
                                            <a class="btn btn-reduce"
                                                wire:click.prevent="minusqty('{{ $item->rowId }}')" href="#"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">${{ $item->model->regular_price * $item->qty }}</p>
                                    </div>
                                    <div class="delete">
                                        <a href="#" class="btn btn-delete"
                                            wire:click.prevent="removeitem('{{ $item->rowId }}')" title="">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>
                            @if (Session::has('couponValid'))
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">$
                                        {{ Cart::instance('cart')->subtotal() }}</b></p>

                                <p class="summary-info"><span class="title">Discount
                                        ({{ Session::get('couponValid')['code'] }} )</span><b class="index">
                                        -
                                        {{ Session::get('couponValid')['type'] == 'fixed' ? '$' . Session::get('couponValid')['value'] : Session::get('couponValid')['value'] . '%' }}</b>
                                    <a href="#" class="btn btn-delete" wire:click.prevent="removeCoupon"
                                        style="color: red;" title="">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </p>
                                <p class="summary-info"><span class="title">Subtotal with Discount</span><b
                                        class="index">$
                                        {{ number_format($subtotalAfterDiscount, 2) }}</b></p>
                                <p class="summary-info"><span class="title">Tax (21%)</span><b
                                        class="index">${{ number_format($taxlAfterDiscount, 2) }}</b>
                                </p>
                                <p class="summary-info total-info "><span class="title">Total</span><b
                                        class="index">${{ number_format($totallAfterDiscount, 2) }}</b></p>
                            @else
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">$
                                        {{ Cart::instance('cart')->subtotal() }}</b></p>
                                <p class="summary-info"><span class="title">Tax (21%)</span><b
                                        class="index">${{ Cart::instance('cart')->tax() }}</b>
                                </p>
                                <p class="summary-info total-info "><span class="title">Total</span><b
                                        class="index">${{ Cart::instance('cart')->total() }}</b></p>
                            @endif

                        </div>
                        <div class="checkout-info">
                            <label class="checkbox-field">
                                <input class="frm-input " name="have-code" id="have-code" wire:model='haveCoupon'
                                    value="1" type="checkbox"><span>I have promo code</span>
                            </label>
                            @if ($haveCoupon == 1)
                                <div style="margin: 20px 0;" class="summary-item">
                                    <form wire:submit.prevent='checkValidCoupon' name="frm-billing">
                                        <h4 class="title-box">Enter Your Coupon code:</h4>
                                        @if (session('error-coupon'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error-coupon') }}
                                            </div>
                                        @endif
                                        <p class="row-in-form">
                                            <label for="coupon-code">Enter Your Coupon code:</label>
                                            <input id="coupon-code" wire:model='code_coupon' required type="text"
                                                name="coupon-code" placeholder="">
                                        </p>
                                        <button type="submit" class="btn btn-small">Apply</button>
                                    </form>
                                </div>
                            @endif
                            <a class="btn btn-checkout" href="checkout.html">Check out</a>
                            <a class="link-to-shop" href="shop.html">Continue Shopping<i
                                    class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            <a class="btn btn-clear" wire:click.prevent="removeallitem()" href="#">Clear
                                Shopping
                                Cart</a>
                            <a class="btn btn-update" href="#">Update Shopping Cart</a>
                        </div>
                    </div>
                @else
                    <div class="no-products">
                        <p>No products in here . Please back to the shop for buy something.</p>
                        <a href="{{ route('Shop') }}" class="link">Click to shopping</a>
                    </div>
                @endif

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_4.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_17.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_15.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_1.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_21.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_3.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_4.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_5.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
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
            <!--end main content area-->
        </div>
        <!--end container-->

    </main>
</div>
