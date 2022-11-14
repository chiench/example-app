<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class HomeSliderAddComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;
    public function mount()
    {
        $this->status = 0;
    }
    public function AddHomeSlider()
    {
        $homeslider = new HomeSlider();

        $homeslider->title  = $this->title;
        $homeslider->subtitle = $this->subtitle;
        $homeslider->price = $this->price;
        if (is_null($this->image)) {
            $homeslider->image = '';
        } else {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('sliders', $imageName);
            $homeslider->image = $imageName;
        }

        $homeslider->link = $this->link;
        $homeslider->status = $this->status;
        $homeslider->save();
        session()->flash('add-success', 'Add homeslider successfully');
    }

    public function render()
    {
        return view('livewire.admin.home-slider-add-component')->layout('layouts.base');
    }
}
