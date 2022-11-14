<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeSliderComponent extends Component
{
    public $search;
    public function removeSearch()
    {
        $this->search = '';
    }
    public function deleteHomeSlider($id)
    {
        $homeslider = HomeSlider::findOrFail($id);
        $homeslider->delete();
        session()->flash('succesful-remove', 'The item has been successfull removed');
    }
    public function render()
    {
        if ($this->search) {
            $homeslider = HomeSlider::orderBy('created_at', 'DESC')->where('title', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            $homeslider = HomeSlider::orderBy('created_at', 'DESC')->paginate(4);
        }
        return view('livewire.admin.home-slider-component', [
            'homeslider' => $homeslider,
        ])->layout('layouts.base');
    }
}
