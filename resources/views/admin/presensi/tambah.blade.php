@extends('layout.admin')
@section('title', 'Tambah Presensi')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Tambah Presensi</h3>
            </center>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger mx-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/tambah-presensi" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <select class="form-select" id="pilihKaryawan">
                        <option>Pilih Karyawan</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama" id="autofillNama">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="autofillJabatan" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="">
                        <option>Pilih Status</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                </div>
                <div class="my-2">
                    <center>
                        <a href="/presensi" class="btn btn-secondary">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Batal</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#pilihKaryawan').change(function() {
                var optionValue = $(this).val();

                if (optionValue != 'Pilih Karyawan') {
                    $.ajax({
                        url: '/get-data-karyawan',
                        type: 'GET',
                        data: {
                            id: optionValue
                        },
                        success: function(response) {
                            $('#autofillNama').val(response.nama);
                            $('#autofillJabatan').val(response.jabatan);
                        }
                    });
                } else {
                    $('#autofillNama').val('');
                    $('#autofillJabatan').val('');
                }
            });
        });
    </script>
@endpush
