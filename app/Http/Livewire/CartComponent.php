<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

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

    public function render()
    {
        // Cart::instance('cart')->instance('cart')->destroy();
        // dd(Cart::instance('wishlist')->content());
        $products = Cart::instance('cart')->content();
        return view('livewire.cart-component', [
            'products' => $products,
        ])->layout('layouts.base');
    }
}
