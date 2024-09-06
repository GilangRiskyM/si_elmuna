<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKeluarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ket_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ket_pengeluaran.required' => 'Keterangan Pengeluaran wajib diisi!',
            'jumlah_pengeluaran.required' => 'Jumlah Pengeluaran wajib diisi!'
        ];
    }
}
