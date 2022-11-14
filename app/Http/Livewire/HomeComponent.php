<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategories;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public $category_id;
    public $slug;
    public function render()
    {
        $homeslider = HomeSlider::where('status', 1)->get();
        $latestProduct = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $homecategories = HomeCategories::find(1);
        $no_of_product = $homecategories->no_of_product;
        $cat = explode(',', $homecategories->sel_categories);
        if ($cat) {
            $categoriesInHome = Category::whereIn('id', $cat)->get();
            $products_of_category = [];
            for ($x = 0; $x < count($cat); $x++) {
                $singleProduct = Product::where('category_id', $categoriesInHome[$x]->id)->get()->take($no_of_product);
                array_push($products_of_category, $singleProduct);
            }
        }

        return view('livewire.home-component', [
            'homeslider' => $homeslider,
            'latestProduct' => $latestProduct,
            'categoriesInHome' => $categoriesInHome,
            'products_of_category' => $products_of_category,
        ])->layout('layouts.base');
    }
}
