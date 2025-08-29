<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $categoryId = $this->route('category') ? $this->route('category')->id : null;
        return [
            'code' => 'required|max:255|unique:categories,code' . ($categoryId ? ",{$categoryId}" : ''),
            'name' => 'required|max:255',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Category code is required.',
            'code.unique' => 'This category code already exists.',
            'name.required' => 'Category name is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
