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
        $categories = Category::with(['subCategory', 'categoryWiseSpecialOfferProducts', 'categoryWiseSpecialDeals'])->latest()->get();
        $sliders = Slider::latest()->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->take(3)->get();
        $featured_products = Product::where('featured', 1)->take(6)->get();
        return view('frontend.index', compact('categories', 'sliders', 'products', 'hot_deals', 'featured_products'));
    }
}
