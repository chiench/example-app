<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $search;
    public function removeSearch()
    {
        $this->search = '';
    }
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('succesful-remove', 'The item has been successfull removed');
    }
    public function render()
    {
        if ($this->search) {
            $products = Product::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $this->search . '%')->paginate(4);
            return view('livewire.admin.product-component', [
                'products' => $products,
            ])->layout('layouts.base');
        } else {
            $products = Product::orderBy('created_at', 'DESC')->paginate(4);
            return view('livewire.admin.product-component', [
                'products' => $products,
            ])->layout('layouts.base');
        }
    }
}
