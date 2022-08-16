<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubSubcategoryRequest;
use App\Models\SubSubcategory;

class SubSubcategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::latest()->get();
        $sub_subcategories = SubSubcategory::with(['subCategory', 'category'])->latest()->paginate(15);
        return view('backend.subsubcategory.index', compact('sub_subcategories', 'categories'));
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
    public function store(SubSubcategoryRequest $request) {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        SubSubcategory::create($data);

        return redirect()->back()->with(['message' => 'Sub Subcategory Created Successfully', 'alert-type' => 'success']);
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
    public function edit($id) {
        $sub_subcategory = SubSubcategory::find($id);
        $categories = Category::latest()->get();
        $subcategories = Subcategory::where('category_id', $sub_subcategory->category_id)->get();

        return view('backend.subsubcategory.edit', compact('categories', 'subcategories', 'sub_subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubSubcategoryRequest $request, $id) {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        $sub_subcategory = SubSubcategory::find($id);
        $sub_subcategory->update($data);


        return redirect()->route('admin.subsubcategory.index')->with(['message' => 'Sub Subcategory Updated Successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $sub_subcategory = SubSubcategory::find($id);
        $sub_subcategory->delete();
        return redirect()->back()->with(['message' => 'Sub SubCategory Deleted Successfully', 'alert-type' => 'success']);
    }

    public function getSubcategoryAjax($id) {
        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }

    public function getSubSubcategoryAjax($id) {
        $sub_subcategories = SubSubcategory::where('subcategory_id', $id)->get();
        return response()->json($sub_subcategories);
    }
}
