<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tanaman;
use App\Http\Resources\TanamanResource;
use App\Models\Plants;
use Illuminate\Support\Facades\Storage;

class TanamanController extends Controller
{
    // Menampilkan semua tanaman
    public function index() {
        $tanaman = Plants::all();
        return TanamanResource::collection($tanaman);
        // if ($request->is('api/*')) {
        //     // Jika permintaan datang dari API
        // } else {
        //     // Jika permintaan datang dari web
        //     return view('backend.plants.index', compact('tanaman'));
        // }
    }

    // Menampilkan tanaman berdasarkan ID
    public function show($id) {
        $tanaman = Plants::findOrFail($id);
        return new TanamanResource($tanaman);
    }

    // Menyimpan tanaman baru
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_tanaman' => 'required',
            'image_tanaman' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_tanaman' => 'required',
            'deskripsi_tanaman' => 'required',
            'size_tanaman' => 'required',
            'suhu_tanaman' => 'required',
            'kelembapan_tanaman' => 'required',
            'harga_tanaman' => 'required',
            'stok_tanaman' => 'required',
            // 'status_tanaman' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
            // if ($request->is('api/*')) {
            //     // Jika permintaan datang dari API
            // } else {
            //     // Jika permintaan datang dari web
            //     return redirect()->back()->withErrors($validator)->withInput();
            // }
        }

        $image_tanaman = $request->file('image_tanaman');
        $image_name = time() . '.' . $image_tanaman->getClientOriginalExtension();
        $image_tanaman->storeAs('uploads/tanaman/', $image_name);

        $tanaman = Plants::create([
            'nama_tanaman' => $request->nama_tanaman,
            'image_tanaman' => $image_name,
            'kategori_tanaman' => $request->kategori_tanaman,
            'deskripsi_tanaman' => $request->deskripsi_tanaman,
            'size_tanaman' => $request->size_tanaman,
            'suhu_tanaman' => $request->suhu_tanaman,
            'kelembapan_tanaman' => $request->kelembapan_tanaman,
            'harga_tanaman' => $request->harga_tanaman,
            'stok_tanaman' => $request->stok_tanaman,
            // 'status_tanaman' => $request->status_tanaman,
        ]);

        return new TanamanResource($tanaman);
        // if ($request->is('api/*')) {
        //     // Jika permintaan datang dari API
        // } else {
        //     // Jika permintaan datang dari web
        //     return redirect('/plants')->with('success', 'Tanaman telah berhasil ditambah.');
        // }
    }



    public function tambah()
    {
        return view('backend.plants.tambah');
    }

    // public function edit($id)
    // {
    //     // Mengambil data tanaman berdasarkan id yang dipilih
    //     $tanaman = Plants::findOrFail($id);
    //     // Passing data tanaman yang didapat ke view edit.blade.php
    //     return view('backend.plants.edit', compact('tanaman'));
    // }

    public function update(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_tanaman' => 'required',
        'image_tanaman' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'kategori_tanaman' => 'required',
        'deskripsi_tanaman' => 'required',
        'size_tanaman' => 'required',
        'suhu_tanaman' => 'required',
        'kelembapan_tanaman' => 'required',
        'harga_tanaman' => 'required',
        'stok_tanaman' => 'required',
        // 'status_tanaman' => 'required',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        if ($request->is('api/*')) {
            return response()->json(['error' => $validator->errors()], 400);
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    // Cari tanaman berdasarkan ID
    $tanaman = Plants::findOrFail($id);

    // Jika ada file gambar baru yang diunggah
    if ($request->hasFile('image_tanaman')) {
        // Hapus gambar lama jika ada
        if ($tanaman->image_tanaman) {
            Storage::delete('uploads/tanaman/' . $tanaman->image_tanaman);
        }

        // Unggah gambar baru
        $image_tanaman = $request->file('image_tanaman');
        $image_name = time() . '.' . $image_tanaman->getClientOriginalExtension();
        $image_tanaman->storeAs('uploads/tanaman/', $image_name);

        // Update nama gambar di database
        $tanaman->image_tanaman = $image_name;
    }

    // Update data tanaman lainnya
    $tanaman->nama_tanaman = $request->nama_tanaman;
    $tanaman->kategori_tanaman = $request->kategori_tanaman;
    $tanaman->deskripsi_tanaman = $request->deskripsi_tanaman;
    $tanaman->size_tanaman = $request->size_tanaman;
    $tanaman->suhu_tanaman = $request->suhu_tanaman;
    $tanaman->kelembapan_tanaman = $request->kelembapan_tanaman;
    $tanaman->harga_tanaman = $request->harga_tanaman;
    $tanaman->stok_tanaman = $request->stok_tanaman;
    // $tanaman->status_tanaman = $request->status_tanaman;

    // Simpan perubahan
    $tanaman->save();

    // Mengembalikan respons yang sesuai
    if ($request->is('api/*')) {
        return new TanamanResource($tanaman);
    } else {
        return redirect('/plants')->with('success', 'Tanaman telah berhasil diperbarui.');
    }
}


    public function hapus($id)
    {
        $plant = Plants::findOrFail($id);
        $plant->delete();
        
        return redirect('/plants')->with('success', 'Data Tanaman telah berhasil dihapus.');
    }

}



// class TanamanController extends Controller
// {
//     // menampilkan semua tanaman
//     public function index(){
//         $tanaman = Tanaman::all();
//         return response()->json(['tanaman' =>$tanaman], 200);
//     }

//     // menampilkan  tanaman berdasarkan id
//     public function show($id){
//         $tanaman = Tanaman::findOrFail($id);
//         return response()->json(['tanaman' => $tanaman], 200);
//     }

//     // menyimpan tanaman baru
//     public function store(Request $request){
//         $request->validate([
//             'nama_tanaman' => 'required',
//             'image_tanaman' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'deskripsi_tanaman' => 'required',
//             'size_tanaman' => 'required',
//             'suhu_tanaman' => 'required',
//             'kelembaban_tanaman' => 'required',
//             'harga_tanaman' => 'required',
//             'stok_tanaman' => 'required',
//             'status_tanaman' => 'required',
//         ],);

//         $request->image_tanaman->storeAs('uploads/tanaman/', $request->image_tanaman->getClientOriginalName());
//         $tanaman= Tanaman::create([
//             'nama_tanaman' => $request->nama_tanaman,
//             'image_tanaman' => $request->image_tanaman->getClientOriginalName(),
//             'deskripsi_tanaman' => $request->deskripsi_tanaman,
//             'size_tanaman' => $request->size_tanaman,
//             'suhu_tanaman' => $request->suhu_tanaman,
//             'kelembaban_tanaman' => $request->kelembaban_tanaman,
//             'harga_tanaman' => $request->harga_tanaman,
//             'stok_tanaman' => $request->stok_tanaman,
//             'status_tanaman' => $request->status_tanaman,
//         ]);

//         return response()->json(['tanaman' => $tanaman, 'message' => 'Tanaman created successfully'], 200);
        
//     }
// }

// $image_tanaman = $request->file('image_tanaman');
        // $image_tanaman_new_name = time() . '.' . $image_tanaman->getClientOriginalExtension();
        // $image_tanaman->move('uploads/tanaman/', $image_tanaman_new_name);

        // return $image_tanaman_new_name;

