<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $product = $this->route()->parameter('product');

        $rules = [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:products,slug',
            'description' => 'nullable|min:5',
            'category_id' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'file'
        ];

        if ($this->route()->named('products.update')) {
            $rules['slug'] .= ", $product->id";
        }

        return $rules;
    }
}
