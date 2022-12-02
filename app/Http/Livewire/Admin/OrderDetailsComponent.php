<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class OrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
        $orders = Order::find($this->order_id);
        return view('livewire.admin.order-details-component', compact('orders'))->layout('layouts.base');
    }
}
