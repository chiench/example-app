<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{

    public function render()
    {
        $products = Product::paginate(6);
        $count_product = Product::count();
        return view('livewire.shop-component', compact([
            'products',
            'count_product',
        ]))->layout('layouts.base');
    }
}
