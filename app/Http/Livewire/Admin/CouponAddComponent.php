<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CouponAddComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expire_date;
    public function mount()
    {
        $this->type = 'fixed';
    }

    // protected $rules = [
    //     'name' => 'required|min:6',
    //     'slug' => 'required|unique:categories,slug',
    // ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }
    public function storeCoupon()
    {
        // $this->validate();
        // $slug_test = Category::where('slug', $this->slug)->first();

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->value = $this->value;
        $coupon->type = $this->type;
        $coupon->expire_date = $this->expire_date;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('add-success', 'Add coupon successfully');
        // if ($slug_test === null) {
        //     $coupon->slug = $this->slug;
        //     $coupon->save();
        //     session()->flash('add-success', 'Add category successfully');
        // } else {
        //     session()->flash('add-error', 'Slug must unique');
        // }
    }
    public function render()
    {
        return view('livewire.admin.coupon-add-component')->layout('layouts.base');
    }
}
