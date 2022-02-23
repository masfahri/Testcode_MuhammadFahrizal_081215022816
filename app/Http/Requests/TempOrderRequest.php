<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempOrderRequest extends FormRequest
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
            'kode_item' => 'required',
            'qty'       => 'required|numeric|min:1|max:12',
        ];
    }
   
    /**
     * Set the Massages rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'kode_item.required' => ':attribute Mohon Isi',
            'qty.required'       => ':attribute Mohon Isi',
            'qty.numeric'       => ':attribute Mohon isi Dengan Numeric',
            'qty.min'       => ':attribute Jumlah Minimal Pemesanan 1',
            'qty.max'       => ':attribute Jumlah Max Pemesanan 12',
        ];
    }
    
    /**
     * Set the Attribute for parssing to Massages rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'kode_item' => 'Menu',
            'qty'       => 'Jumlah',
        ];
    }
}
