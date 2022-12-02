<div>
    <style>

    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Order Details</span></li>
            </ul>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div
                        class="panel-heading"style="display: flex; align-content: space-between; justify-content: space-between;">
                        Order Details
                        <div class="search">
                            {{-- @if ($orders->status == 'canceled')
                                <a href="" style="margin-right: 10px" class="btn btn-warning">
                                    Cancel</a>
                            @endif --}}


                            <a href="{{ route('admin.orders') }}" class="btn btn-danger"> All
                                Orders</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $orders->id }}
                                <th>Order Date</th>
                                <td>{{ $orders->created_at }}
                                <th>Status</th>
                                <td>{{ $orders->status }}

                                    @if ($orders->status == 'deliverd')
                                <th>Deliverd Date</th>
                                <td>{{ $orders->deliverd }}
                                @elseif ($orders->status == 'canceled')
                                <th>Canceled Date</th>
                                <td>{{ $orders->canceled }}
                                    @endif
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (Session::has('succesful-remove'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('succesful-remove') }}
                    </div>
                @endif

                <div class="panel panel-default">

                    <div class="panel-heading"> Ordered Item
                    </div>
                    <div class="panel-body">
                        {{-- {{ $orders->orderItem->products }} --}}
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach ($orders->orderItem as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img
                                                    src="{{ asset('assets/images/products/') }}/{{ $item->product->image }}"
                                                    alt=""></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="#">{{ $item->product->name }}</a>
                                        </div>
                                        <div class="price-field produtc-price">
                                            <p class="price">${{ $item->product->regular_price }}</p>
                                        </div>
                                        <div class="quantity">
                                            <div class="quantity-input">
                                                <input type="text" name="product-quatity"
                                                    value="{{ $item->quantity }}">

                                            </div>
                                        </div>
                                        <div class="price-field sub-total">
                                            <p class="price">${{ $item->product->regular_price * $item->quantity }}
                                            </p>
                                        </div>

                                    </li>
                                @endforeach
                                <div class="summary">
                                    <div class="order-summary">
                                        <h4 class="title-box">Order Summary</h4>

                                        <p class="summary-info"><span class="title">Discount</span><b class="index">$
                                                {{ $orders->discount }}</b></p>

                                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">$
                                                {{ $orders->subtotal }}</b></p>
                                        <p class="summary-info"><span class="title">Tax (21%)</span><b
                                                class="index">${{ $orders->tax }}</b>
                                        </p>
                                        <p class="summary-info total-info "><span class="title">Total</span><b
                                                class="index">${{ $orders->total }}</b></p>


                                    </div>

                                </div>


                            </ul>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default">

                    <div class="panel-heading"> Billing Address
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $orders->firstname }}
                                <th>Last Name</th>
                                <td>{{ $orders->lastname }}
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $orders->phone }}
                                <th>Address</th>
                                <td>{{ $orders->address }}
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $orders->email }}
                                <th>City</th>
                                <td>{{ $orders->city }}
                            </tr>
                            <tr>
                                <th>Zipcode</th>
                                <td>{{ $orders->zipcode }}
                                <th>Country</th>
                                <td>{{ $orders->country }}
                            </tr>
                        </table>
                    </div>
                </div>
                @if ($orders->is_shipping_different)
                    <div class="panel panel-default">
                        <div class="panel-heading"> Shipping Address
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $orders->shipping->firstname }}
                                    <th>Last Name</th>
                                    <td>{{ $orders->shipping->lastname }}
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $orders->shipping->phone }}
                                    <th>Address</th>
                                    <td>{{ $orders->shipping->address }}
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $orders->shipping->email }}
                                    <th>City</th>
                                    <td>{{ $orders->shipping->city }}
                                </tr>
                                <tr>
                                    <th>Zipcode</th>
                                    <td>{{ $orders->shipping->zipcode }}
                                    <th>Country</th>
                                    <td>{{ $orders->shipping->country }}
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
                @if ($orders->transaction)
                    <div class="panel panel-default">
                        <div class="panel-heading"> Transaction
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>Mode</th>
                                    <td>{{ $orders->transaction->mode }}

                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $orders->transaction->status }}

                                </tr>
                                <tr>
                                    <th>Transition Date</th>
                                    <td>{{ $orders->transaction->created_at }}
                                </tr>

                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
