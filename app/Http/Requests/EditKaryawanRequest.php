<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKaryawanRequest extends FormRequest
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
            'nama' => 'required',
            'jabatan' => 'required',
            'tanda_tangan' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ];
    }

    function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi!',
            'jabatan.required' => 'Jabatan harus diisi!',
            'tanda_tangan.required' => 'Tanda tangan harus diisi!',
            'tanda_tangan.image' => 'Tanda tangan harus berupa gambar!',
            'tanda_tangan.mimes' => 'Ekstensi yang diperbolehkan hanya untuk format jpeg, jpg, dan png!',
            'tanda_tangan.max' => 'Ukuran gambar tidak boleh lebih dari :max MB!'
        ];
    }
}
