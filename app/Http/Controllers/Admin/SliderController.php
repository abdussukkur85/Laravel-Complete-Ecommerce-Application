<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $sliders = Slider::latest()->paginate(15);
        return view('backend.slider.index', compact('sliders'));
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
    public function store(SliderRequest $request) {

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            if (!File::exists("/uploads/backend/slider")) {
                File::makeDirectory(public_path() . '/uploads/backend/slider', $mode = 0777, true, true);
            }
            Image::make($file)->resize(870, 370)->save('uploads/backend/slider/' . $filename);
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $filename;
        $slider->save();

        return redirect()->back()->with(['message' => 'Slider Created Successfully', 'alert-type' => 'success']);
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
    public function edit(Slider $slider) {
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider) {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            Image::make($file)->resize(870, 370)->save('uploads/backend/slider/' . $filename);
            File::delete('uploads/backend/slider/' . $slider->image);
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        if ($request->file('image')) {
            $slider->image = $filename;
        }
        $slider->update();

        return redirect()->route('admin.slider.index')->with(['message' => 'Slider Updated Successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider) {
        File::delete('uploads/backend/slider/' . $slider->image);
        $slider->delete();
        return redirect()->route('admin.slider.index')->with(['message' => 'Slider Deleted Successfully', 'alert-type' => 'success']);
    }

    public function inActive(Slider $slider) {
        $slider->status = 0;
        $slider->update();
        return redirect()->back()->with(['message' => 'Slider Inactive Successfully', 'alert-type' => 'success']);
    }

    public function active(Slider $slider) {
        $slider->status = 1;
        $slider->update();
        return redirect()->back()->with(['message' => 'Slider Activated Successfully', 'alert-type' => 'success']);
    }
}
