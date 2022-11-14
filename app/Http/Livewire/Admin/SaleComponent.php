<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SaleComponent extends Component
{
    public $sale_date;
    public $status;
    public function render()
    {
        return view('livewire.admin.sale-component')->layout('layouts.base');
    }
}
