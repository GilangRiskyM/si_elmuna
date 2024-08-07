<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahPemrogramanRequest extends FormRequest
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
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'paket' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 karakter',
            'nama.required' => 'Nama wajib diisi',
            'tempat_lahir' => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'jk.required' => 'Jenis Kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'kabupaten.required' => 'Kabupaten wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'status.required' => 'Status wajib diisi',
            'nama_ibu.required' => 'Nama Ibu wajib diisi',
            'nama_ayah.required' => 'Nama Ayah wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
            'paket.required' => 'Paket wajib diisi',
        ];
    }
}
