<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategories;
use Livewire\Component;

class HomeCategoryComponent extends Component
{
    public $sel_categories = [];
    public $no_of_product;
    public function mount()
    {
        $home_category = HomeCategories::find(1);
        $this->sel_categories = explode(',', $home_category->sel_categories);
        $this->no_of_product = $home_category->no_of_product;
    }
    public function updateHomeCategories()
    {
        $home_category = HomeCategories::find(1);
        $home_category->sel_categories = implode(',', $this->sel_categories);
        $home_category->no_of_product = $this->no_of_product;
        $home_category->save();
        session()->flash('Update-success', 'Update HomeCategories successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.home-category-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
