<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryAddComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required|unique:categories,slug',
    ];
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function storeCategory()
    {
        $this->validate();
        $slug_test = Category::where('slug', $this->slug)->first();
        $category = new Category();
        $category->name = $this->name;
        if ($slug_test === null) {
            $category->slug = $this->slug;
            $category->save();
            session()->flash('add-success', 'Add category successfully');
        } else {
            session()->flash('add-error', 'Slug must unique');
        }
    }


    public function render()
    {

        return view('livewire.admin.category-add-component')->layout('layouts.base');
    }
}
