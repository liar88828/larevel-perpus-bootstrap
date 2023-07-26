<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresuratRequest extends FormRequest
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
            'jenis' => 'required|min:5',
            'keterangan' => 'required|min:5',
            'jam_kerja' => 'required|min:5',
            'jam_lembur' => 'required|min:2',
            'lama' => 'required|min:5',
            'acc_divisi' => 'required|min:1',
            'acc_direktur' => 'required|min:2',
            'lampiran' => 'required|min:2',
            'status' => 'required|min:2',
        ];
    }
}