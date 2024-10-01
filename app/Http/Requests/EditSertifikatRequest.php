<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSertifikatRequest extends FormRequest
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
            'no_sertifikat' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nis' => 'required',
            'program' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_sertifikat.required' => 'Nomor Sertifikat wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'nis.required' => 'NIS wajib diisi',
            'program.required' => 'Program wajib diisi',
            'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',
            'tgl_selesai.required' => 'Tanggal Selesai wajib diisi',

        ];
    }
}
