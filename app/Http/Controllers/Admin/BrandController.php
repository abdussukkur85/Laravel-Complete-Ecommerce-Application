<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $brands = Brand::latest()->paginate(10);
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request) {

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            if (!File::exists("/uploads/backend/brand")) {
                File::makeDirectory(public_path() . '/uploads/backend/brand', $mode = 0777, true, true);
            }
            Image::make($file)->resize(150, 150)->save('uploads/backend/brand/' . $filename);
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->image = $filename;
        $brand->save();

        return redirect()->back()->with(['message' => 'Brand Created Successfully', 'alert-type' => 'success']);
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
    public function edit(Brand $brand) {
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand) {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            Image::make($file)->resize(150, 150)->save('uploads/backend/brand/' . $filename);
            File::delete('uploads/backend/brand/' . $brand->image);
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        if ($request->file('image')) {
            $brand->image = $filename ?? $brand->filename;
        }
        $brand->update();

        return redirect()->route('admin.brand.index')->with(['message' => 'Brand Updated Successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand) {
        File::delete('uploads/backend/brand/' . $brand->image);
        $brand->delete();
        return redirect()->route('admin.brand.index')->with(['message' => 'Brand Deleted Successfully', 'alert-type' => 'success']);
    }
}
