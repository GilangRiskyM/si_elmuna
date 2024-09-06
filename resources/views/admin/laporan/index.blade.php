@extends('layouts.app')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Elmuna Laporan')
@section('content')
    <center>
        <h1 class="my-3">Laporan Pemasukan Dan Pengeluaran</h1>
    </center>
    <div class="col-md-6">
        <label class="mb-2">Filter Data</label>
        <form action="/laporan" method="get">
            <div class="input-group">
                <span class="input-group-text">Pilih Data</span>
                <select name="filter_tanggal" id="" class="form-select">
                    <option value="" {{ $tanggal == '' ? 'selected' : null }}>Semua Data</option>
                    <option value="hari_ini" {{ $tanggal == 'hari_ini' ? 'selected' : null }}>Hari Ini</option>
                    <option value="kemarin" {{ $tanggal == 'kemarin' ? 'selected' : null }}>Kemarin</option>
                    <option value="minggu_ini" {{ $tanggal == 'minggu_ini' ? 'selected' : null }}>Minggu Ini</option>
                    <option value="minggu_lalu" {{ $tanggal == 'minggu_lalu' ? 'selected' : null }}>Minggu Lalu</option>
                    <option value="bulan_ini" {{ $tanggal == 'bulan_ini' ? 'selected' : null }}>Bulan Ini</option>
                    <option value="bulan_lalu" {{ $tanggal == 'bulan_lalu' ? 'selected' : null }}>Bulan Lalu</option>
                    <option value="tahun_ini" {{ $tanggal == 'tahun_ini' ? 'selected' : null }}>Tahun Ini</option>
                    <option value="tahun_lalu" {{ $tanggal == 'tahun_lalu' ? 'selected' : null }}>Tahun Lalu</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/laporan" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="row">
            <label for="" class="mb-2">Export Data</label>
            <div class="col-md-4">
                <form action="/laporan/export" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text">Pilih Data</span>
                        <select name="ekspor" id="" class="form-select">
                            <option value="">Semua Data</option>
                            <option value="hari_ini">Hari Ini</option>
                            <option value="kemarin">Kemarin</option>
                            <option value="minggu_ini">Minggu Ini</option>
                            <option value="minggu_lalu">Minggu Lalu</option>
                            <option value="bulan_ini">Bulan Ini</option>
                            <option value="bulan_lalu">Bulan Lalu</option>
                            <option value="tahun_ini">Tahun Ini</option>
                            <option value="tahun_lalu">Tahun Lalu</option>
                        </select>
                        <button type="submit" class="btn btn-success">Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <center>
                    <h3>Pemasukan</h3>
                </center>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Keterangan Pemasukan</th>
                                <th>Tanggal</th>
                                <th>Jumlah Pemasukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1 + ($masuk->currentPage() - 1) * $masuk->perPage();
                            @endphp
                            @if ($masuk->count() > 0)
                                @foreach ($masuk as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->ket_pemasukan }}</td>
                                        <td>{{ tgl_indonesia3($data->created_at) }}</td>
                                        <td>Rp. {{ number_format($data->jumlah_pemasukan, 0, ',', '.') }} ,-</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <h3>Data Kosong</h3>
                                        </center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $masuk->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="col-md-6">
                <center>
                    <h3>Pengeluaran</h3>
                </center>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Keterangan Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>Jumlah Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1 + ($keluar->currentPage() - 1) * $keluar->perPage();
                            @endphp
                            @if ($keluar->count() > 0)
                                @foreach ($keluar as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->ket_pengeluaran }}</td>
                                        <td>{{ tgl_indonesia3($data->created_at) }}</td>
                                        <td>Rp. {{ number_format($data->jumlah_pengeluaran, 0, ',', '.') }} ,-</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <h3>Data Kosong</h3>
                                        </center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $keluar->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4>Jumlah Pemasukan = Rp. {{ number_format($totalMasuk, 0, ',', '.') }} ,-</h4>
    <h4>Jumlah Pengeluaran = Rp. {{ number_format($totalKeluar, 0, ',', '.') }} ,-</h4>
    <h4>Total Pendapatan = Rp. {{ number_format($total, 0, ',', '.') }} ,-</h4>
@endsection
