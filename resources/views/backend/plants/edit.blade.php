@extends('layouts.app')
@section('title', 'Edit Tanaman')
@section('content')
<div class="admin-content">
    <h3>Edit Tanaman</h3>

    <a href="/plants" class="btn btn-secondary mb-3">Kembali</a>

    <form action="/plants/update/{{ $plant->id }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan?')">
        @csrf
        <input type="hidden" name="id" value="{{ $plant->id }}">

        <div class="form-group">
            <label for="nama_tanaman">Nama Tanaman:</label>
            <input type="text" class="form-control" required="required" name="nama_tanaman" value="{{ $plant->nama_tanaman }}">
        </div>

        <div class="form-group">
            <label for="kategori_tanaman">Kategori Tanaman:</label>
            <input type="text" class="form-control" required="required" name="kategori_tanaman" value="{{ $plant->kategori_tanaman }}">
        </div>

        <div class="form-group">
            <label for="size_tanaman">Size Tanaman:</label>
            <input type="text" class="form-control" required="required" name="size_tanaman" value="{{ $plant->size_tanaman }}">
        </div>

        <div class="form-group">
            <label for="kelembapan_tanaman">Kelembapan Tanaman:</label>
            <input type="text" class="form-control" required="required" name="kelembapan_tanaman" value="{{ $plant->kelembapan_tanaman }}">
        </div>

        <div class="form-group">
            <label for="suhu_tanaman">Suhu Tanaman:</label>
            <input type="text" class="form-control" required="required" name="suhu_tanaman" value="{{ $plant->suhu_tanaman }}">
        </div>

        <div class="form-group">
            <label for="harga_tanaman">Harga Tanaman:</label>
            <input type="text" class="form-control" required="required" name="harga_tanaman" value="{{ $plant->harga_tanaman }}">
        </div>

        <div class="form-group">
            <label for="stok_tanaman">Stok Tanaman:</label>
            <input type="text" class="form-control" required="required" name="stok_tanaman" value="{{ $plant->stok_tanaman }}">
        </div>

        <div class="form-group">
            <label for="deskripsi_tanaman">Deskripsi Tanaman:</label>
            <textarea class="form-control" name="deskripsi_tanaman" required="required">{{ $plant->deskripsi_tanaman }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_tanaman">Gambar:</label>
            <input type="file" class="form-control-file" name="image_tanaman">
            <br/>
            <img src="{{ asset('images/' . $plant->image_tanaman) }}" alt="Gambar Tanaman" style="max-width: 100px;">
        </div>

        <br/>
        <input type="submit" class="btn btn-success" value="Simpan Perubahan">
    </form>
</div>
@endsection
