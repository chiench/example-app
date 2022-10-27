<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{


    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function render()
    {
        $product_details = Product::where('slug', $this->slug)->first();
        return view('livewire.details-component', [
            'slug' => $this->slug,
            'product_details' => $product_details,
        ])->layout('layouts.base');
    }
}
