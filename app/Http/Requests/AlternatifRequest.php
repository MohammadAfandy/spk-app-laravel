<?php

namespace SpkApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternatifRequest extends FormRequest
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
            'nama' => 'required|string|max:150',
            'ket' => 'string|max:200',
            'spk_id' => 'required|exists:spk,id',
        ];
    }
}
