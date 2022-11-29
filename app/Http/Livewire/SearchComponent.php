<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class SearchComponent extends Component
{

    public $search;
    public $product_cat_name;
    public $product_cat_id;
    public $sorting;
    public $pagesize;
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 6;
        $this->fill(request()->only('search', 'product_cat_name', 'product_cat_id'));
    }
    public function addToCart($product)
    {
        Cart::instance('cart')->add($product['id'], $product['name'], 1, $product['regular_price'])->associate('\App\Models\Product');
        session()->flash('success', 'Task was sucessful');
        return redirect()->route('Cart');
    }
    public function render()
    {

        $count_product = Product::count();
        // Cart::destroy();
        if ($this->sorting == "date") {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == "price") {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == "price-desc") {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')->paginate($this->pagesize);
        }
        return view('livewire.search-component', compact([
            'products',
            'count_product',
        ]))->layout('layouts.base');
    }
}
