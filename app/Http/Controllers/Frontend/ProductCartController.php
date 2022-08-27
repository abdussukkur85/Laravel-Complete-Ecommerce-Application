<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductCartController extends Controller {

    public function addToCart(Request $request, $id) {

        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'colour' => $request->colour,
                    'size' => $request->size
                ]
            ]);

            return response()->json(['success' => "Successfully Added on your cart."]);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'colour' => $request->colour,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => "Successfully Added on your cart."]);
        }
    }



    public function miniCart() {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartSubTotal = Cart::subTotal();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'subTotal' => $cartSubTotal,

        ));
    }

    public function RemoveMiniCart($rowId) {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);
    }
}
