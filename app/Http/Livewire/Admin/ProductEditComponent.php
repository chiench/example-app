<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductEditComponent extends Component
{
    use WithFileUploads;
    public $initialSlug;
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
    public $newImage;
    public $quatity;
    public $category_id;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $this->initialSlug = $product->slug;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->image = $product->image;
        $this->quatity = $product->quatity;
        $this->category_id = $product->category_id;
    }
    public function updateProduct()
    {
        $product = Product::where('slug', $this->initialSlug)->firstOrFail();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        if (is_null($this->newImage)) {
            $product->image = $this->image;
        } else {
            $NamenewImage = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $NamenewImage);
            $product->image = $NamenewImage;
        }
        $product->quatity = $this->quatity;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('update-success', 'Update product successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product-edit-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
