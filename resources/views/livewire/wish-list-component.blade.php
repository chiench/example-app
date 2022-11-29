<div>
    <style>
        .whitelist {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            font-size: 32px;
            z-index: 999;
        }

        .whitelist .fa {
            color: #ff2832 !important;
        }
    </style>
    <main id="main" class="main-site right-sidebar">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>WishList Item</span></li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content-area">
                <div class="row">
                    @if (Cart::instance('wishlist')->count() > 0)
                        <ul class="product-list grid-products equal-container">
                            @foreach ($wishlists as $wishlist)
                                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">

                                        <div class="product-thumnail">
                                            <a href="{{ route('detail', ['slug' => $wishlist->model->slug]) }}"
                                                title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/' . $wishlist->model->image) }}"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="whitelist">

                                                <a href=""><i class="fa fa-heart" aria-hidden="true"></i></a>

                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('detail', ['slug' => $wishlist->model->slug]) }}"
                                                class="product-name"><span>{{ $wishlist->model->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{ $wishlist->model->regular_price }}</span>
                                            </div>
                                            <a href="#" wire:click.prevent="addToCart({{ $wishlist->model }})"
                                                class="btn add-to-cart">Add To Cart</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nothing in here @@</p>
                    @endif


                </div>
                {{-- <div class="wrap-pagination-info paginate-shop">
                    {{ $wishlists->model->links() }}
                    <p class="result-count">Showing 1- {{ $wishlists->count() }} of {{ $countWishlist }} result</p>
                </div> --}}
            </div>
        </div>
    </main>
</div>
