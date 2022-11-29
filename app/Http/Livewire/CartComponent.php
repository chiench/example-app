<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Carbon\Carbon;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

use function PHPSTORM_META\elementType;

class CartComponent extends Component
{
    public function addqty($rowId)
    {
        $products = Cart::instance('cart')->get($rowId);
        $qty = $products->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('refreshComponent');
        session()->flash('success', 'Task was successful');
    }
    public function minusqty($rowId)
    {
        $products = Cart::instance('cart')->get($rowId);
        $qty = $products->qty - 1;
        if ($products->qty !== 0) {

            session()->flash('success-remove', 'Removing Item was successful');
        } else {
            session()->flash('success', 'Task was successful');
        }
        $this->emit('refreshComponent');
        Cart::instance('cart')->update($rowId, $qty);
    }
    public function removeitem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success-remove', 'Removing Item was successful');
        $this->emit('refreshComponent');
    }
    public function removeallitem()
    {
        Cart::instance('cart')->destroy();
        $this->emit('refreshComponent');
        session()->flash('success-remove', 'Removing Item was successful');
    }

    //handle coupon
    public $haveCoupon;
    public $code_coupon;
    public $subtotalAfterDiscount;
    public $taxlAfterDiscount;
    public $totallAfterDiscount;

    public function checkValidCoupon()
    {
        // dd($this->code_coupon);
        $coupon = Coupon::where('code', $this->code_coupon)->where('expire_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (is_null($coupon)) {
            session()->flash('error-coupon', 'Invalid typed coupon');
        } else {
            session()->put('couponValid', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value,
            ]);
            $this->handleCouponValid();
            // dd($coupon);
        }
    }
    public function handleCouponValid()
    {
        // var_dump(session()->get('couponValid')['value']);
        // dd(1);
        if (session()->get('couponValid')['type'] == 'fixed') {
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - session()->get('couponValid')['value'];
            // dd($this->subtotalAfterDiscount);
        } else {
            $this->subtotalAfterDiscount = (Cart::instance('cart')->subtotal() * session()->get('couponValid')['value']) / 100;
        }
        $this->taxlAfterDiscount =  ($this->subtotalAfterDiscount * Cart::tax()) / 100;
        $this->totallAfterDiscount = $this->subtotalAfterDiscount + $this->taxlAfterDiscount;
    }
    public function removeCoupon()
    {
        session()->forget('couponValid');
    }

    public function render()
    {
        if (Session::has('couponValid')) {
            if (Cart::instance('cart')->subtotal() < session()->get('couponValid')['value']) {

                session()->forget('couponValid');
            } else {
                $this->handleCouponValid();
            }
        }
        // Cart::instance('cart')->instance('cart')->destroy();
        // dd(Cart::instance('wishlist')->content());
        $products = Cart::instance('cart')->content();
        return view('livewire.cart-component', [
            'products' => $products,
        ])->layout('layouts.base');
    }
}
