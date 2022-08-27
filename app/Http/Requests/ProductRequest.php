<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        $rules = [
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'sub_subcategory_id' => 'required|integer',
            'sub_subcategory_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'tags' => 'required',
            'colours' => 'required',
            'selling_price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string|max:500',

        ];
        if ($this->getMethod() == 'POST') {
            $rules += [
                'thumbnail' => 'required|mimes:jpeg,png,jpg,gif',
                'gallery_image' => 'required|array',
                'gallery_image.*' => 'mimes:jpeg,png,jpg,gif'
            ];
        } else if ($this->getMethod() == 'PUT' && request()->file('thumbnail')) {
            $rules += [
                'thumbnail' => 'required|mimes:jpeg,png,jpg,gif',
            ];
        } else if ($this->getMethod() == 'PUT' && request()->file('gallery_image')) {
            $rules += [
                'gallery_image' => 'required|array',
                'gallery_image.*' => 'mimes:jpeg,png,jpg,gif'
            ];
        }
        return $rules;
    }


    public function attributes() {
        return [
            'brand_id' => 'Brand Name',
            'category_id' => 'Category Name',
            'subcategory_id' => 'Subcategory Name',
            'sub_subcategory_id' => 'Sub Subcategory Name',
            'gallery_image' => 'Multiple Image',
            'gallery_image.*' => 'Multiple Image',
            'long_description' => 'product_description',
        ];
    }
}
