<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CouponComponent extends Component
{
    public $search;

    public function deletecat($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        session()->flash('succesful-remove', 'The item has been successfull removed');
    }
    public function removeSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $coupons = Coupon::where('name', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            $coupons = Coupon::paginate(4);
        }

        return view('livewire.admin.coupon-component', [
            'coupons' => $coupons,
        ])->layout('layouts.base');
    }
}
