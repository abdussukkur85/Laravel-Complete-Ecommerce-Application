<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest {
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
            'name' => 'required|string|max:255'
        ];
        if ($this->getMethod() == 'POST') {
            $rules += ['image' => 'required|mimes:png,jpeg,gif'];
        } else if ($this->getMethod() == 'PUT' && request()->file('image')) {
            $rules += ['image' => 'required|mimes:png,jpeg,gif'];
        }
        return $rules;
    }


    public function attributes() {
        return [
            'name' => 'Brand Name',
            'image' => 'Brand Image',
        ];
    }
}
