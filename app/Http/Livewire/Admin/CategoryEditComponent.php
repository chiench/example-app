<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryEditComponent extends Component
{
    public $name;
    public $slug;
    public $initialSlug;
    public function mount($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $this->initialSlug = $category->slug;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $category = Category::where('slug', $this->initialSlug)->first();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('update-success', 'Update category successfully');
    }
    public function render()
    {
        return view('livewire.admin.category-edit-component')->layout('layouts.base');
    }
}
