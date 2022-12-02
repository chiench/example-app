<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function updateCanceledOrderStatus($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'canceled';
        $orders->canceled = DB::raw('CURRENT_DATE');
        $orders->save();
        session()->flash('succesful-update', 'The item has been successfull update');
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        return view('livewire.user.user-order-details-component', compact('orders'))->layout('layouts.base');
    }
}
