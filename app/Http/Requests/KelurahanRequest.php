<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelurahanRequest extends FormRequest
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
            'kode' => 'required|unique:t_kelurahans,kode|min:4',
            'nama' => 'required',
            'kode_kecamatan' => 'required'
        ];
    }
}
