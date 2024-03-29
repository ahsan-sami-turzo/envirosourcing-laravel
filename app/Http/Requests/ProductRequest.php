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
        return [
            'product_name' => 'nullable',
            'product_description' => 'nullable',
            'product_image' => 'nullable',
            'sisterconcern_id' => 'required',
            'category_id' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'sisterconcern_id.required' => 'The company name field is required.',
            'category_id.required' => 'The category name field is required.',

        ];
    }
}
