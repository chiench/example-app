<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class HomeSliderEditComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $newImage;
    public $link;
    public $status;
    public $slider_id;
    public function mount($id)
    {
        $this->slider_id = $id;
        $homeslider = HomeSlider::where('id', $id)->firstOrFail();
        $this->title  = $homeslider->title;
        $this->subtitle = $homeslider->subtitle;
        $this->price = $homeslider->price;
        $this->image = $homeslider->image;
        $this->link = $homeslider->link;
        $this->status = $homeslider->status;
    }
    public function updateHomeSlider()
    {
        $homeslider = HomeSlider::where('id', $this->slider_id)->firstOrFail();

        $homeslider->title  = $this->title;
        $homeslider->subtitle = $this->subtitle;
        $homeslider->price = $this->price;
        if (is_null($this->newImage)) {
            $homeslider->image = $this->image;
        } else {
            $NamenewImage = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders', $NamenewImage);
            $homeslider->image = $NamenewImage;
        }
        $homeslider->link = $this->link;
        $homeslider->status = $this->status;
        $homeslider->save();
        session()->flash('update-success', 'Update homeslider successfully');
    }

    public function render()
    {
        return view('livewire.admin.home-slider-edit-component')->layout('layouts.base');
    }
}
