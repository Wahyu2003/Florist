@extends('layouts.app')
@section('title', 'Data Admin')
@section('content')
<div class="admin-content">
    <h3>Data Admin</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="/admin/tambah" class="btn btn-primary mb-3">+ Tambah Admin Baru</a>
    <br><br>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Jenis Kelamin</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admin as $ad)
            <tr>
                <td>{{ $ad->nama_admin }}</td>
                <td>{{ $ad->username }}</td>
                <td class="password-cell" data-password="{{ $ad->password }}">{{ $ad->password }}</td>
                <td>{{ $ad->jenis_kelamin }}</td>
                <td>
                    <a href="/admin/edit/{{ $ad->id }}" class="btn btn-warning">Edit</a>
                    <a href="/admin/hapus/{{ $ad->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data admin ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
