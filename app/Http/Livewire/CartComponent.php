<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class CartComponent extends Component
{
    public function addqty($rowId)
    {
        $products = Cart::get($rowId);
        $qty = $products->qty + 1;
        Cart::update($rowId, $qty);
        session()->flash('success', 'Task was successful');
    }
    public function minusqty($rowId)
    {
        $products = Cart::get($rowId);
        $qty = $products->qty - 1;
        if ($products->qty !== 0) {
            session()->flash('success-remove', 'Removing Item was successful');
        } else {
            session()->flash('success', 'Task was successful');
        }
        Cart::update($rowId, $qty);
    }
    public function removeitem($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success-remove', 'Removing Item was successful');
    }
    public function removeallitem()
    {
        Cart::destroy();
        session()->flash('success-remove', 'Removing Item was successful');
    }

    public function render()
    {
        $products = Cart::content();
        return view('livewire.cart-component', [
            'products' => $products,
        ])->layout('layouts.base');
    }
}
