<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $category = $this->route()->parameter('category');
        
        $rules = [
            'name' => 'required|min:3|max:255|unique:categories,name',
            'slug' => 'required|min:3|max:255|unique:categories,slug',
            'description' => 'nullable|min:5',
            'image' => 'file'
        ];

        if ($this->route()->named('categories.update')) {
            $rules['name'] .= ", $category->id";
            $rules['slug'] .= ", $category->id";
        }

        return $rules;
    }
}
