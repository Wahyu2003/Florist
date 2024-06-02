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
                <td class="password-cell">{{ $pl->deskripsi_tanaman }}</td>
                <td>
                    @if($pl->image_tanaman)
                        <img src="{{ asset('images/' . $pl->image_tanaman) }}" alt="Gambar Tanaman"  class="plant-image">
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </td>
                <td>
                    <a href="/plants/edit/{{ $pl->id }}" class="btn btn-warning">Edit</a>
                    {{-- <a href="/plants/hapus/{{ $pl->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Tanaman ini?')">Hapus</a> --}}
                    <a href="/plants/hapus/{{ $pl->id }}" class="btn btn-danger btn-lg btn-delete">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <h2>Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus data tanaman ini?</p>
            <div class="modal-buttons">
                <button class="modal-button confirm" id="confirmDelete">Hapus</button>
                <button class="modal-button cancel" id="cancelDelete">Batal</button>
            </div>
        </div>
    </div>
</div>
@endsection
