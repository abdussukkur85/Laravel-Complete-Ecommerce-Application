<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function index() {
        $products = Product::latest()->where('status', 1)->take(6)->get();
        $categories = Category::with(['subCategory'])->latest()->get();
        $sliders = Slider::latest()->get();
        return view('frontend.index', compact('categories', 'sliders', 'products'));
    }
}
