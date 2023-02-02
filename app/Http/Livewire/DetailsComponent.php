<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
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
        $order_items = OrderItem::where('rstatus', 1)->get();
        $count_order_items = OrderItem::where('rstatus', 1)->count();
        // dd($order_items->review);
        // dd($product_details->orderItem);
        return view('livewire.details-component', [
            'slug' => $this->slug,
            'product_details' => $product_details,
            'order_items' => $order_items,
            'count_order_items' => $count_order_items,
        ])->layout('layouts.base');
    }
}
