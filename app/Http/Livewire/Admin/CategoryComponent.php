<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{

    public $search;

    public function deletecat($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('succesful-remove', 'The item has been successfull removed');
    }
    public function removeSearch()
    {
        $this->search = '';
    }
    public function render()
    {
        if ($this->search) {
            $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            $categories = Category::paginate(4);
        }
        return view('livewire.admin.category-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
