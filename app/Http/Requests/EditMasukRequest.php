<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMasukRequest extends FormRequest
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
            'ket_pemasukan' => 'required',
            'jumlah_pemasukan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ket_pemasukan.required' => 'Keterangan Pemasukan wajib diisi!',
            'jumlah_pemasukan' => 'Jumlah Pemasukan wajib diisi!'
        ];
    }
}
