@extends('layouts.app')
@section('title', 'Edit Admin')
@section('content')
<div class="admin-content">
    <h3>Edit Admin</h3>

    <a href="/admin" class="btn btn-primary">Kembali</a>
    
    <br/>
    <br/>

    <form action="/admin/update/{{ $admin->id }}" method="post" onsubmit="return confirmSubmission()">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $admin->id }}"> <br/>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" required="required" name="nama_admin" value="{{ $admin->nama_admin }}">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" required="required" name="username" value="{{ $admin->username }}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="password-input-container">
                <input type="password" class="form-control" name="password" id="password" placeholder="Kosongkan jika tidak ingin mengubah">
                <span id="password-toggle-btn" class="password-toggle-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="auto">
                    <title>Show</title>
                    <path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                </svg>
            </div>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label><br/>
            <div class="form-check form-check-inline">
                <input type="radio" id="laki-laki" class="form-check-input" name="jenis_kelamin" value="laki-laki" {{ $admin->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="perempuan" class="form-check-input" name="jenis_kelamin" value="perempuan" {{ $admin->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        <br/>
        <input type="submit" class="btn btn-success" value="Simpan Data">
    </form>
</div>

{{-- <script>
    // Fungsi konfirmasi sebelum pengiriman formulir
    function confirmSubmission() {
        return confirm('Apakah Anda yakin ingin menyimpan perubahan?');
    }

    // Function to toggle password visibility
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordToggleBtn = document.getElementById("password-toggle-btn");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleBtn.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            passwordToggleBtn.textContent = "Show";
        }
    }

    // Event listener for password toggle button
    document.getElementById("password-toggle-btn").addEventListener("click", togglePasswordVisibility);
</script> --}}

@endsection
