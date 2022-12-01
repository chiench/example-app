<div>
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <form action="#" wire:submit.prevent='placeOrder' name="frm-billing">
                <div class=" main-content-area">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>

                        <p class="row-in-form">
                            <label for="fname">first name<span>*</span></label>
                            <input wire:model='firstname' id="fname" type="text" name="fname" value=""
                                placeholder="Your name">
                        </p>
                        <p class="row-in-form">
                            <label for="lname">last name<span>*</span></label>
                            <input wire:model='lastname' id="lname" type="text" name="lname" value=""
                                placeholder="Your last name">
                        </p>
                        <p class="row-in-form">
                            <label for="email">Email Addreess:</label>
                            <input wire:model='email' id="email" type="email" name="email" value=""
                                placeholder="Type your email">
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input wire:model='phone' id="phone" type="number" name="phone" value=""
                                placeholder="10 digits format">
                        </p>
                        <p class="row-in-form">
                            <label for="add">Address:</label>
                            <input wire:model='address' id="add" type="text" name="add" value=""
                                placeholder="Street at apartment number">
                        </p>
                        <p class="row-in-form">
                            <label for="country">Country<span>*</span></label>
                            <input wire:model='country' id="country" type="text" name="country" value=""
                                placeholder="United States">
                        </p>
                        <p class="row-in-form">
                            <label for="zip-code">Postcode / ZIP:</label>
                            <input wire:model='zipcode' id="zip-code" type="number" name="zip-code" value=""
                                placeholder="Your postal code">
                        </p>
                        <p class="row-in-form">
                            <label for="city">Town / City<span>*</span></label>
                            <input wire:model='city' id="city" type="text" name="city" value=""
                                placeholder="City name">
                        </p>
                        <p class="row-in-form fill-wife">
                            <label class="checkbox-field">
                                <input wire:model='is_shipping_different' name="different-add" id="different-add"
                                    type="checkbox">
                                <span>Ship to a different address?</span>
                            </label>
                        </p>
                        @if ($is_shipping_different)
                            <h3 class="box-title">Shipping Address</h3>
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input wire:model='shipping_firstname' type="text" name="fname" value=""
                                    placeholder="Your name">
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input wire:model='shipping_lastname' type="text" name="lname" value=""
                                    placeholder="Your last name">
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input wire:model='shipping_email' type="email" name="email" value=""
                                    placeholder="Type your email">
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input wire:model='shipping_phone' type="number" name="phone" value=""
                                    placeholder="10 digits format">
                            </p>
                            <p class="row-in-form">
                                <label for="add">Address:</label>
                                <input wire:model='shipping_address' type="text" name="add" value=""
                                    placeholder="Street at apartment number">
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input wire:model='shipping_country' type="text" name="country" value=""
                                    placeholder="United States">
                            </p>
                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input wire:model='shipping_zipcode' type="number" name="zip-code" value=""
                                    placeholder="Your postal code">
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input wire:model='shipping_city' type="text" name="city" value=""
                                    placeholder="City name">
                            </p>
                        @endif

                    </div>
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Payment Method</h4>
                            <p class="summary-info"><span class="title">Check / Money order</span></p>
                            <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" wire:model='paymode'
                                        value="cod" type="radio">
                                    <span>Cash on Delivery</span>
                                    <span class="payment-desc">Order Now pay on delivery</span>
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-visa" wire:model='paymode'
                                        value="card" type="radio">
                                    <span>Debit/Credit Card</span>
                                    <span class="payment-desc">Use Debit or Credit Card to pay </span>
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" wire:model='paymode' id="payment-method-paypal"
                                        value="paypal" type="radio">
                                    <span>Paypal</span>
                                    <span class="payment-desc">You can pay with your credit</span>
                                    <span class="payment-desc">card if you don't have a paypal account</span>
                                </label>
                            </div>
                            <p class="summary-info grand-total"><span>Grand Total</span> <span
                                    class="grand-total-price">${{ session('checkout')['total'] }}</span></p>
                            <button type="submit" class="btn btn-medium">Place order now</a>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed $50.00</span></p>

                        </div>
                    </div>
                </div>
            </form>

            <!--end main content area-->
        </div>
        <!--end container-->

    </main>
</div>
