<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sales;
use Livewire\Component;

class SaleComponent extends Component
{
    public $sale_date;
    public $status;
    public function mount()
    {
        $sales = Sales::find(4);
        $sales->status ?  $this->status = '1' : $this->status = '0';
        $this->sale_date = $sales->sale_date;
    }


    public function updateSalesTime()
    {
        $sales = Sales::find(4);
        $sales->status = $this->status;
        $sales->sale_date = $this->sale_date;
        $sales->save();
        session()->flash('Update-success', 'Update Sales successfully');
    }
    public function render()
    {
        return view('livewire.admin.sale-component')->layout('layouts.base');
    }
}
