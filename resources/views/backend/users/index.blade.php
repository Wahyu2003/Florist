@extends('layouts.app')
@section('title', 'Data pengguna')
@section('content')
<div class="admin-content">
    <h3>DATA PENGGUNA</h3>
	<br>
    <table class="admin-table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Alamat Rumah</th>
			<th>No. Telp</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Opsi</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->password }}</td>
			<td>{{ $user->alamat_rumah }}</td>
			<td>{{ $user->no_telp }}</td>
			<td>{{ $user->tanggal_lahir }}</td>
			<td>{{ $user->jenis_kelamin }}</td>
			<td>
				<a href="/users/destroy/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data pengguna ini?')">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
