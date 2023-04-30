<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SisterConcernRequest extends FormRequest
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
            'company_name' => 'required',
            'company_logo'=> 'nullable',
            'company_description'=> 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'The company name field is required.',
            'company_logo.required' => 'The company logo field is required.',
        ];
    }
}
