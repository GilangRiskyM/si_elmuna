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
        ];
    }

    function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi!',
            'jabatan.required' => 'Jabatan harus diisi!',
        ];
    }
}
