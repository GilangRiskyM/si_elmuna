<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahDesainGrafisRequest extends FormRequest
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
            'nik' => 'required|string|size:16',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'telepon' => 'required|integer',
            'email' => 'required',
            'kecamatan' => 'required',
            'paket' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'nik.size' => 'NIK harus 16 digit',
            'nik.required' => 'NIK wajib diisi',
            'nik.integer' => 'NIK harus berupa angka',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'jk.required' => 'Jenis kelamin wajib diisi',
            'nama_ayah.required' => 'Nama ayah wajib diisi',
            'nama_ibu.required' => 'Nama ibu wajib diisi',
            'telepon.required' => 'Nomor WA wajib diisi',
            'telepon.integer' => 'Nomor WA harus berupa angka',
            'email.required' => 'Email wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'paket.required' => 'Paket wajib diisi',
        ];
    }
}
