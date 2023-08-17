<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelIjinLemburRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'kepada' => 'required|min:5',
            'hal' => 'required|min:5',
            'nama' => 'required|min:5',
            'divisi' => 'required|min:5',
            'no' => 'required|min:1',
            'hari_tanggal' => 'required|min:2',
            'jam_kerja_normal' => 'required|min:2',
            'jam_kerja_lembur' => 'required|min:2',
            'guna' => 'required|min:10',
            'nama_divisi' => 'required|min:5',
            'nama_penyetujui' => 'required|min:5',
        ];
    }
}
