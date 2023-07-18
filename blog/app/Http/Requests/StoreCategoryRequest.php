<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  [
            'name' => "required|string|min:3|max:255|unique:categories,name",
            'image' => ['image', 'max:1048576', 'dimensions:min_width=100,min_hight=100'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'name' => $this->name,
        ];
    }
}
