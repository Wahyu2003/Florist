@extends('layouts.app')
@section('title', 'Tambah Tanaman')
@section('content')
<div class="admin-content">
        <h3>Tambah Tanaman</h3>

        <a href="/plants" class="btn btn-primary">Kembali</a>
        <form action="/plants/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama_tanaman">Nama Tanaman:</label>
                <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select name="kategori_tanaman" id="kategori_tanaman" class="form-control" required="required">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="garden">garden</option>
                    <option value="indoor">indoor</option>
                    <option value="outdoor">outdoor</option>
                </select>            
            </div>
            <div class="form-group">
                <label for="size_tanaman">Size Tanaman:</label>
                <input type="number" class="form-control" id="size_tanaman" name="size_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="kelembapan_tanaman">Kelembapan Tanaman:</label>
                <input type="number" class="form-control" id="kelembapan_tanaman" name="kelembapan_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="suhu_tanaman">Suhu Tanaman:</label>
                <input type="number" class="form-control" id="suhu_tanaman" name="suhu_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="harga_tanaman">Harga Tanaman:</label>
                <input type="number" class="form-control" id="harga_tanaman" name="harga_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="stok_tanaman">Stok Tanaman:</label>
                <input type="number" class="form-control" id="stok_tanaman" name="stok_tanaman" required="required">
            </div>
            <div class="form-group">
                <label for="deskripsi_tanaman">Deskripsi Tanaman:</label>
                <textarea class="form-control" id="deskripsi_tanaman" name="deskripsi_tanaman" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="image_tanaman">Gambar:</label>
                <input type="file" class="form-control-file" id="image_tanaman" name="image_tanaman" required="required">
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
@endsection
