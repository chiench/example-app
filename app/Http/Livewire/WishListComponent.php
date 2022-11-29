<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListComponent extends Component
{
    public function addToCart($product)
    {
        Cart::instance('cart')->add($product['id'], $product['name'], 1, $product['regular_price'])->associate('\App\Models\Product');
        session()->flash('success', 'Task was sucessful');
        $this->emit('refreshComponent');
        $this->removeChooseItem($product['id']);
        // return redirect()->route('Cart');
    }
    public function removeChooseItem($rowId)
    {
        foreach (Cart::instance('wishlist')->content() as $wishlist) {
            if ($wishlist->id == $rowId) {
                Cart::instance('wishlist')->remove($wishlist->rowId);
                return;
            }
        }
    }

    public function render()
    {
        $wishlists = Cart::instance('wishlist')->content();

        $countWishlist = Cart::instance('wishlist')->count();
        return view('livewire.wish-list-component', [
            'wishlists' => $wishlists,
            'countWishlist' => $countWishlist,
        ])->layout('layouts.base');
    }
}
