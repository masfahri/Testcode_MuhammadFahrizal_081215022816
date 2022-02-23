<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'nama_pelanggan' => 'required',
            'nomor_meja'     => 'required',
            'jumlah_kembalian' => 'required|min:0|numeric'
        ];
    }

    /**
     * Set the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama_pelanggan.required' => ':attribute Mohon Diisi',
            'nomor_meja.required'     => ':attribute Mohon Diisi',
            'jumlah_kembalian.required' => ':attribute Mohon Diisi',
            'jumlah_kembalian.min' => ':attribute Total Bayar Kurang Dari Jumlah Pembayaran',
            'jumlah_kembalian.numeric' => ':attribute Harus Numeric'
        ];
    }
    
    /**
     * Set the attribute for parsing to validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama_pelanggan' => 'Nama Pelanggan',
            'nomor_meja'     => 'Nomor Meja',
            'jumlah_kembalian' => 'Jumlah Pembayaran'
        ];
    }
}
