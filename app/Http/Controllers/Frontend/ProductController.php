<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Client\ResponseSequence;

class ProductController extends Controller {
    public function details(Product $product) {
        return view('frontend.product.single-product', compact('product'));
    }

    public function tagWiseProduct(Tag $tag) {
        $products = Tag::with('products')->findOrFail($tag->id)->products()->paginate(12);
        return view('frontend.product.tag-wise-product', compact('products', 'tag'));
    }

    public function subcategoryWiseProduct(Subcategory $subcategory) {

        $products = Product::where('subcategory_id', $subcategory->id)->paginate(12);
        return view('frontend.product.subcategory-wise-product', compact('products', 'subcategory'));
    }
    public function subSubcategoryWiseProduct(SubSubcategory $sub_subcategory) {
        $products = Product::where('sub_subcategory_id', $sub_subcategory->id)->paginate(12);
        return view('frontend.product.sub-subcategory-wise-product', compact('products', 'sub_subcategory'));
    }

    public function productModalAjax($id) {

        $product = Product::with(['category', 'brand', 'colours', 'sizes'])->findOrFail($id);
        return response()->json([
            'product' => $product
        ]);
    }
}
