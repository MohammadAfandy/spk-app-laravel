<?php

namespace SpkApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpkRequest extends FormRequest
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
            'nama' => 'required|string|max:50',
            'jenis_bobot_id' => 'required|exists:m_jenis_bobot,id',
        ];
    }
}
