<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EthicRequest extends FormRequest
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
            'title_one'         =>'nullable',
            'title_two'         =>'nullable',
            'title_three'       =>'nullable',
            'title_four'        =>'nullable',
            'subtitle_one'      =>'nullable',
            'subtitle_two'      =>'nullable',
            'ethics_image_one'  =>'nullable',
            'ethics_image_two'  =>'nullable',
            'ethics_image_three'=>'nullable',
            'subtitle_three'    =>'nullable',
        ];
    }
}
