<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $itemId = $this->route('item') ? $this->route('item')->id : null;
        return [
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|max:255|unique:items,code' . ($itemId ? ",{$itemId}" : ''),
            'name' => 'required|max:255',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'brand_id.required' => 'Brand is required.',
            'category_id.required' => 'Category is required.',
            'code.required' => 'Item code is required.',
            'code.unique' => 'This item code already exists.',
            'name.required' => 'Item name is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
