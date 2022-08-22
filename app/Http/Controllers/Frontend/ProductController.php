<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function details(Product $product) {
        return view('frontend.product.single-product', compact('product'));
    }

    public function tagWiseProduct(Tag $tag) {
        return "Yes";
        $products = Product::where('status', 1)->where('id', $tag->product_id)->paginate(10);
        return view('frontend.product.tag-wise-product', compact('tag'));
    }
}
