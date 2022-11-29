<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CouponEditComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.coupon-edit-component')->layout('layouts.base');
    }
}
