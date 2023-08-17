<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id' => 'required|min:1',
            'nama' => 'required|min:1',
            'hari_tanggal' => 'required|min:1',
            'keterangan' => 'required|min:1',
            'hari_kerja' => 'required|min:1',
            // 'mulai_pagi' => 'required|min:1',
            // 'akhir_pagi' => 'required|min:1',
            // 'mulai_malam' => 'required|min:1',
            // 'akhir_malam' => 'required|min:1',
            'acc_divisi' => 'required|min:1',
            'status' => 'required|min:2',
        ];
    }
}