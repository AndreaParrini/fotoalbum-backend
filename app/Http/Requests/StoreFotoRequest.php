<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|unique:fotos|min:3|max:50',
            'description' => 'nullable|max:255',
            'image_path' => 'required|image|mimes:png,jpg,jpeg,bmp|dimensions:width>=400,height>=400|max:500',
            'category_id' => 'exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The :attribute is required',
            'title.min' => 'The :attribute is too short, must be have 5 characters.',
            'title.max' => 'The :attribute is too long, must be have less of 50 characters.',
            'description.max' => 'The :attribute is too long, must be have less of 255 characters.',
            'image_path.required' => 'The :attribute is required, to add you must insert an image.',
            'image_path.image' => 'The :attribute must be an image, extensions accepted are png,jpg,jpeg,bmp',
            'image_path.dimensions' => 'The :attribute has invalid image dimensions. The image must have minimum height 400 and width 400',
            'category_id.exists' => 'The selected category is invalid. Choose one of the value in the select.'
        ];
    }
}
