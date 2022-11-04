<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderComponent extends Component
{
    public $search;
    public $product_cat_name;
    public $product_cat_id;
    public function mount()
    {
        $this->product_cat_name = "All category";
        // $this->product_cat_name = "product1";
        $this->fill(request()->only('search', 'product_cat_name', 'product_cat_id'));
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.header-component', [
            'categories' => $categories,
        ]);
    }
}
