<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderComponent extends Component
{
    public $search;

    public function deletecat($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();
        session()->flash('succesful-remove', 'The item has been successfull removed');
    }
    public function updateDeliverdOrderStatus($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'deliverd';
        $orders->deliverd = DB::raw('CURRENT_DATE');
        $orders->save();
        session()->flash('succesful-update', 'The item has been successfull update');
    }
    public function updateCanceledOrderStatus($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'canceled';
        $orders->canceled = DB::raw('CURRENT_DATE');
        $orders->save();
        session()->flash('succesful-update', 'The item has been successfull update');
    }
    public function removeSearch()
    {
        $this->search = '';
    }
    public function render()
    {
        if ($this->search) {
            $orders = Order::where('user_id', Auth::user()->id)->where('firstname', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(5);
        } else {
            $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
        }
        return view(
            'livewire.admin.order-component',
            compact('orders')
        )->layout('layouts.base');
    }
}
