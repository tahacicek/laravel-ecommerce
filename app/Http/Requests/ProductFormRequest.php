<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'slug' => 'required',
            'category_id' => 'required|integer',
            "brand" => "string|max:255",
            "small_description" => "string|max:255",
            "description" => "string",
            "quantity" => "integer|required",
            "original_price" => "integer|required",
            "selling_price" => "integer|required",
            "trending" => "nullable",
            "status" => "nullable",
            "meta_title" => "string|max:255",
            "meta_description" => "string|max:255",
            "meta_keyword" => "string|max:255",
            "image" => "nullable",
        ];
    }
}
