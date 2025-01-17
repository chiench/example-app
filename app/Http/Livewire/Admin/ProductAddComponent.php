<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProductAddComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $regular_price;
    public $sale_price;
    public $short_description;
    public $description;
    public $SKU;
    public $stock_status;
    public $featured;
    public $image;
    public $quatity;
    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function storeProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        if ($this->sale_price) {
            $product->sale_price = $this->sale_price;
        } else {
            $product->sale_price = 0;
        }
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->SKU = $this->SKU;
        if (is_null($this->image)) {
            $product->image = '';
        } else {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->quatity = $this->quatity;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('add-success', 'Add product successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product-add-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
