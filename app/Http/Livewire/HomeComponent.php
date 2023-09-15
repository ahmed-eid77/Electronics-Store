<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders         = HomeSlider::where('status', 1)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $category        = HomeCategory::find(1);
        $cats            = explode(',', $category->sel_categories);
        $categories      = Category::whereIn('id', $cats)->get();
        $no_of_products  = $category->no_of_products;
        $sale_products   = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $sale            = Sale::find(1);

        return view('livewire.home-component',
                    [
                        'sliders'        => $sliders,
                        'lproducts'      => $latest_products,
                        'categories'     => $categories,
                        'no_of_products' => $no_of_products,
                        'sale_products'  => $sale_products,
                        'sale'           => $sale
                    ])->layout('layouts.base');
    }
}
