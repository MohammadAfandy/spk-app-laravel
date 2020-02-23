<?php

namespace SpkApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubKriteriaRequest extends FormRequest
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
            'sub_kriteria.*.nama' => 'required|string|max:150',
            'sub_kriteria_new.*.nama' => 'required|string|max:150',
            'sub_kriteria.*.nilai' => 'required|integer|max:100',
            'sub_kriteria_new.*.nilai' => 'required|integer|max:100',
            'kriteria_id' => 'required|exists:kriteria,id',
        ];
    }
}