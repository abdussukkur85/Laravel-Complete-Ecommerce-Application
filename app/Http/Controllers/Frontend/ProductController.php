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
        $tag_id = $tag->id;
        $tag_wise_products = Product::whereHas('tags', function ($query) use ($tag_id) {
            $query->where('tag_id', $tag_id);
        })->get();
        return view('frontend.product.tag-wise-product', compact('tag_wise_products', 'tag'));
    }
}
