<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Models\Color;
use App\Models\Colour;
use App\Models\Size;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\returnValue;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::latest()->paginate(10);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $colours = Colour::latest()->get();
        $sizes = Size::latest()->get();
        return view('backend.product.create', compact('brands', 'categories', 'tags', 'colours', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {

        // prepare thumbnail image before upload
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $url = public_path() . '/uploads/backend/thumbnail';
            if (!File::exists($url)) {
                File::makeDirectory($url, $mode = 0777, true, true);
            }
            Image::make($file)->resize(917, 1000)->save($url . '/' . $filename);
        }

        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->sub_subcategory_id = $request->sub_subcategory_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->thumbnail = $filename;
        $product->hot_deals = $request->boolean('hot_deals');;
        $product->featured = $request->boolean('featured');;
        $product->special_offer = $request->boolean('special_offer');
        $product->special_deal = $request->boolean('special_deal');;
        $product->status = 1;
        $product->save();
        $product->tags()->attach($request->tags);
        $product->sizes()->attach($request->sizes);
        $product->colours()->attach($request->colours);


        // prepare thumbnail image before upload
        if ($request->file('gallery_image')) {
            $gallery_images = $request->file('gallery_image');

            foreach ($gallery_images as $gallery_image) {
                // prepare thumbnail image before upload
                $filename = date('YmdHi') . $gallery_image->getClientOriginalName();
                $url = public_path() . '/uploads/backend/gallery_images';
                if (!File::exists($url)) {
                    File::makeDirectory($url, $mode = 0777, true, true);
                }
                Image::make($gallery_image)->resize(917, 1000)->save($url . '/' . $filename);

                MultiImage::insert([
                    'product_id' => $product->id,
                    'gallery_image' => $filename,
                    'created_at' => Carbon::now(),
                ]);
            }
        }


        return redirect()->route('admin.products.index')->with(['message' => 'Product Created Successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $colours = Colour::latest()->get();
        $sizes = Size::latest()->get();

        return view('backend.product.edit', compact('product', 'brands', 'categories', 'tags', 'colours', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product) {

        // prepare thumbnail image before upload
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $url = public_path() . '/uploads/backend/thumbnail';
            if (!File::exists($url)) {
                File::makeDirectory($url, $mode = 0777, true, true);
            }
            Image::make($file)->resize(917, 1000)->save($url . '/' . $filename);
        }

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->sub_subcategory_id = $request->sub_subcategory_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if ($request->file('thumbnail')) {
            $product->thumbnail = $filename;
        }
        $product->hot_deals = $request->boolean('hot_deals');;
        $product->featured = $request->boolean('featured');;
        $product->special_offer = $request->boolean('special_offer');
        $product->special_deal = $request->boolean('special_deal');;
        $product->status = 1;
        $product->tags()->sync($request->tags);
        $product->sizes()->sync($request->sizes);
        $product->colours()->sync($request->colours);
        $product->update();


        // prepare thumbnail image before upload
        if ($request->file('gallery_image')) {
            $gallery_images = $request->file('gallery_image');

            foreach ($gallery_images as $gallery_image) {
                // prepare thumbnail image before upload
                $filename = date('YmdHi') . $gallery_image->getClientOriginalName();
                $url = public_path() . '/uploads/backend/gallery_images';
                if (!File::exists($url)) {
                    File::makeDirectory($url, $mode = 0777, true, true);
                }
                Image::make($gallery_image)->resize(917, 1000)->save($url . '/' . $filename);

                MultiImage::insert([
                    'product_id' => $product->id,
                    'gallery_image' => $filename,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }



        return redirect()->route('admin.products.index')->with(['message' => 'Product Updated Successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        File::delete('uploads/backend/thumbnail/' . $product->thumbnail);
        $gallery_images = MultiImage::where('product_id', $product->id)->get();
        foreach ($gallery_images as $gallery_image) {
            File::delete('uploads/backend/gallery_images/' . $gallery_image->gallery_image);
            $gallery_image->delete();
        }
        $product->delete();
        return redirect()->back()->with(['message' => 'Product Deleted Successfully', 'alert-type' => 'success']);
    }

    public function inActive(Product $product) {
        $product->status = 0;
        $product->update();
        return redirect()->back()->with(['message' => 'Product Inactive Successfully', 'alert-type' => 'success']);
    }

    public function active(Product $product) {
        $product->status = 1;
        $product->update();
        return redirect()->back()->with(['message' => 'Product Activated Successfully', 'alert-type' => 'success']);
    }

    public function deleteGalleryImage($id) {
        $multi_image = MultiImage::find($id);
        $multi_image->delete();
        return response()->json(['message' => 'Gallery Image Deleted Successfully', 'alert-type' => 'success']);
    }
}
