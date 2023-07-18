<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => "required|string|min:3|max:255",
            'description' => "required|string|min:10|max:100",
            'posting_time' => "required",

            'tags' => "required",
            'category_id' => "required",

            'image' => ['image', 'max:1048576', 'dimensions:min_width=100,min_hight=100'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'posting_time' => $this->posting_time,
            'category_id' => $this->category_id,
        ];
    }

}
