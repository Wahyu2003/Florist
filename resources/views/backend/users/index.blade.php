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
				{{-- <a href="/users/destroy/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data pengguna ini?')">Hapus</a> --}}
				<a href="/users/destroy/{{ $user->id }}" class="btn btn-danger btn-lg btn-delete">
					<i class="fas fa-trash-alt"></i> Hapus
				</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <h2>Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus data pengguna ini?</p>
            <div class="modal-buttons">
                <button class="modal-button confirm" id="confirmDelete">Hapus</button>
                <button class="modal-button cancel" id="cancelDelete">Batal</button>
            </div>
        </div>
    </div>
</div>
@endsection
