<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $brandId = $this->route('brand') ? $this->route('brand')->id : null;
        return [
            'code' => 'required|max:255|unique:brands,code' . ($brandId ? ",{$brandId}" : ''),
            'name' => 'required|max:255',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Brand code is required.',
            'code.unique' => 'This brand code already exists.',
            'name.required' => 'Brand name is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
