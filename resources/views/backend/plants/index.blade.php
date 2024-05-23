@extends('layouts.app')
@section('title', 'Data Tanaman')
@section('content')
<div class="admin-content">
    <h3>DATA TANAMAN</h3>
    <a href="/plants/tambah" class="btn btn-primary">+ Tambah Tanaman Baru</a>
    <br><br>
    <table class="admin-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Size</th>
                <th>Kelembapan</th>
                <th>Suhu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plants as $pl)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pl->nama_tanaman }}</td>
                <td>{{ $pl->kategori_tanaman }}</td>
                <td>{{ $pl->size_tanaman }}</td>
                <td>{{ $pl->kelembapan_tanaman }}</td>
                <td>{{ $pl->suhu_tanaman }}</td>
                <td>{{ $pl->harga_tanaman }}</td>
                <td>{{ $pl->stok_tanaman }}</td>
                <td>{{ $pl->deskripsi_tanaman }}</td>
                <td>
                    @if($pl->image_tanaman)
                        <img src="{{ asset('images/' . $pl->image_tanaman) }}" alt="Gambar Tanaman"  class="plant-image">
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </td>
                <td>
                    <a href="/plants/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                    <a href="/plants/hapus/{{ $pl->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Tanaman ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
