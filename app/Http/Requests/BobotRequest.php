<?php

namespace SpkApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BobotRequest extends FormRequest
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
            'bobot' => 'required|sum_equals:100',
            'bobot.*' => 'required|numeric|between:1,100',
        ];
    }
}