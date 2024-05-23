<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel admin
        $admin = Admin::all();
        // Mengirim data admin ke view index
        return view('backend.admin.index', ['admin' => $admin]);
    }

    public function tambah()
    {
        // Memanggil view tambah
        return view('backend.admin.tambah');
    }
    // method untuk insert data ke table admin
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_admin' => 'required|max:30',
            'username' => 'required|max:25|unique:admin,username',
            'password' => 'required|max:255', // Perpanjang panjang password untuk bcrypt
            'jenis_kelamin' => 'required|max:10',
        ]);

        // Hash password sebelum menyimpan
        $request['password'] = bcrypt($request->password);

        // Insert data ke tabel admin
        Admin::create($request->all());

        // Alihkan halaman ke halaman admin dengan pesan sukses
        return redirect('/admin')->with('success', 'Admin telah berhasil ditambah.');
    }

    // method untuk edit data admin
    public function edit($id)
    {
        // Mengambil data admin berdasarkan id yang dipilih
        $admin = Admin::findOrFail($id);
        // Passing data admin yang didapat ke view edit.blade.php
        return view('backend.admin.edit', compact('admin'));
    }
    // update data admin
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_admin' => 'required|max:30',
            'username' => 'required|max:25|unique:admin,username,' . $id,
            'password' => 'nullable|max:255', 
            'jenis_kelamin' => 'required|max:10',
        ]);

        // Mengambil data admin berdasarkan id yang dipilih
        $admin = Admin::findOrFail($id);

        // Update data admin
        $admin->nama_admin = $request->nama_admin;
        $admin->username = $request->username;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password); // Hash password baru
        }
        $admin->jenis_kelamin = $request->jenis_kelamin;
        $admin->save();

        // Alihkan halaman ke halaman admin dengan pesan sukses
        return redirect('/admin')->with('success', 'Admin telah berhasil diupdate.');
    }

    // Method untuk hapus data admin
    public function hapus($id)
    {
        // Menghapus data admin berdasarkan id yang dipilih
        Admin::destroy($id);

        // Alihkan halaman ke halaman admin dengan pesan sukses
        return redirect('/admin')->with('success', 'Admin telah berhasil dihapus.');
    }
}
