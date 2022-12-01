<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transition;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;



class CheckoutComponent extends Component
{

    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $country;
    public $zipcode;
    public $city;
    public $is_shipping_different;
    public $thankyou;
    public $paymode;
    //shipping
    public $shipping_firstname;
    public $shipping_lastname;
    public $shipping_email;
    public $shipping_phone;
    public $shipping_address;
    public $shipping_country;
    public $shipping_zipcode;
    public $shipping_city;

    public function placeOrder()
    {

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->city = $this->city;
        $order->discount = session('checkout')['discount'];
        $order->subtotal = session('checkout')['subtotal'];
        $order->tax = session('checkout')['tax'];
        $order->total = session('checkout')['total'];
        $order->status = 'ordered';
        $order->save();


        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = 1;
            $orderItem->save();
        }
        if ($this->is_shipping_different) {
            $shipping = new Shipping();
            $shipping->order_id =  $order->id;
            $shipping->firstname = $this->shipping_firstname;
            $shipping->lastname = $this->shipping_lastname;
            $shipping->email = $this->shipping_email;
            $shipping->phone = $this->shipping_phone;
            $shipping->address = $this->shipping_address;
            $shipping->country = $this->shipping_country;
            $shipping->zipcode = $this->shipping_zipcode;
            $shipping->city = $this->shipping_city;
            $shipping->discount = session('checkout')['discount'];
            $shipping->subtotal = session('checkout')['subtotal'];
            $shipping->tax = session('checkout')['tax'];
            $shipping->total = session('checkout')['total'];
            $shipping->save();
        }
        if ($this->paymode) {
            $transaction = new Transition();
            $transaction->order_id = $order->id;
            $transaction->user_id = Auth::user()->id;
            if ($this->paymode == 'cod') {
                $transaction->mode = $this->paymode;
            } elseif ($this->paymode == 'card') {
                $transaction->mode = $this->paymode;
            } else {
                $transaction->mode = 'paypal';
            }

            $transaction->status = 'pending';
            $transaction->save();
        }
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        $this->verifyForCheckOut();
    }
    public function verifyForCheckOut()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        } elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('Shop');
        }
    }
    public function render()
    {
        $this->verifyForCheckOut();

        // if (Session::has('checkout')) {
        //     dd(session('checkout'));
        // }

        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
