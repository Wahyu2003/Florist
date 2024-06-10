<?php

// END ini yang baru

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plants;
use Illuminate\Support\Str;

class PlantsController extends Controller
{
    public function index()
    {
        $plants = Plants::all();
        return view('backend.plants.index', compact('plants'));
    }
    
    public function landing()
    {
        $plants = Plants::all()->groupBy('kategori_tanaman');
        return view('landingpage', compact('plants'));
    }

    public function showDetail($id)
    {
        $plantd = Plants::findOrFail($id);
        return view('landingpage', compact('plantd'));
    }

    public function getDetail($id)
    {
        $plant = Plants::findOrFail($id);
        return response()->json($plant);
    }



    // public function shoppage()
    // {
    //     $plants = Plants::all()->groupBy('kategori_tanaman');
    //     return view('shop', compact('plants'));
    // }
    public function cari(Request $request)
    {
        $cari = $request->input('cari');
        $plants = Plants::where('nama_tanaman', 'like', "%{$cari}%")
                        ->orWhere('kategori_tanaman', 'like', "%{$cari}%")
                        ->get()
                        ->groupBy('kategori');
        return view('landingpage', compact('plants'));
    }

    public function ajaxCari(Request $request)
    {
        $cari = $request->input('cari');
        $plants = Plants::where('nama_tanaman', 'like', "%{$cari}%")->get(['id', 'nama_tanaman']);
        return response()->json($plants);
    }
    
    public function tambah()
    {
        return view('backend.plants.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required',
            'image_tanaman' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'kategori_tanaman' => 'required',
            'deskripsi_tanaman' => 'required',
            'size_tanaman' => 'required|numeric',
            'suhu_tanaman' => 'required|numeric',
            'kelembapan_tanaman' => 'required|numeric',
            'harga_tanaman' => 'required|numeric',
            'stok_tanaman' => 'required|numeric',
        ]);

        $imageName = time().'.'.$request->image_tanaman->extension();  
        $request->image_tanaman->move(public_path('images'), $imageName);

        $plant = new Plants();
        $plant->nama_tanaman = $request->nama_tanaman;
        $plant->image_tanaman = $imageName;
        $plant->kategori_tanaman = $request->kategori_tanaman;
        $plant->deskripsi_tanaman = $request->deskripsi_tanaman;
        $plant->size_tanaman = $request->size_tanaman;
        $plant->suhu_tanaman = $request->suhu_tanaman;
        $plant->kelembapan_tanaman = $request->kelembapan_tanaman;
        $plant->harga_tanaman = $request->harga_tanaman;
        $plant->stok_tanaman = $request->stok_tanaman;
        $plant->save();

        return redirect('/plants')->with('success', 'Tanaman telah berhasil ditambah.');
    }

    public function edit($id)
    {
        // Mengambil data tanaman berdasarkan id yang dipilih
        $plant = Plants::findOrFail($id);
        // Passing data tanaman yang didapat ke view edit.blade.php
        return view('backend.plants.edit', compact('plant'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_tanaman' => 'required',
            'image_tanaman' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'kategori_tanaman' => 'required',
            'deskripsi_tanaman' => 'required',
            'size_tanaman' => 'required|numeric',
            'suhu_tanaman' => 'required|numeric',
            'kelembapan_tanaman' => 'required|numeric',
            'harga_tanaman' => 'required|numeric',
            'stok_tanaman' => 'required|numeric',
        ]);

        // Update data tanaman berdasarkan id
        $plant = Plants::findOrFail($id);

        if ($request->hasFile('image_tanaman')) {
            // Mengunggah gambar baru jika ada
            $imageName = time() . '.' . $request->image_tanaman->getClientOriginalExtension();
            $request->image_tanaman->move(public_path('images'), $imageName);
            $plant->image_tanaman = $imageName;
        }

        // Memperbarui data tanaman
        $plant->nama_tanaman = $request->nama_tanaman;
        $plant->deskripsi_tanaman = $request->deskripsi_tanaman;
        $plant->kategori_tanaman = $request->kategori_tanaman;
        $plant->size_tanaman = $request->size_tanaman;
        $plant->suhu_tanaman = $request->suhu_tanaman;
        $plant->kelembapan_tanaman = $request->kelembapan_tanaman;
        $plant->harga_tanaman = $request->harga_tanaman;
        $plant->stok_tanaman = $request->stok_tanaman;
        $plant->save();

        // Alihkan halaman ke halaman '/plants' dengan pesan sukses
        return redirect('/plants')->with('success', 'Data Tanaman berhasil diupdate.');
    }

    public function hapus($id)
    {
        $plant = Plants::findOrFail($id);
        $plant->delete();
        
        return redirect('/plants')->with('success', 'Data Tanaman telah berhasil dihapus.');
    }
}


// START ini yang original code

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Plants;
// use Illuminate\Support\Str;

// class PlantsController extends Controller
// {
//     public function index()
//     {
//         $plants = Plants::all();
//         return view('backend.plants.index', compact('plants'));
//     }

//     public function combine()
//     {
//         $plants = Plants::all()->groupBy('kategori_tanaman');
//         return view('combine', compact('plants'));
//     }

//     public function shoppage()
//     {
//         $plants = Plants::all()->groupBy('kategori_tanaman');
//         return view('shop', compact('plants'));
//     }

//     public function tambah()
//     {
//         return view('backend.plants.tambah');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama_tanaman' => 'required',
//             'image_tanaman' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
//             'kategori_tanaman' => 'required',
//             'deskripsi_tanaman' => 'required',
//             'size_tanaman' => 'required|numeric',
//             'suhu_tanaman' => 'required|numeric',
//             'kelembapan_tanaman' => 'required|numeric',
//             'harga_tanaman' => 'required|numeric',
//             'stok_tanaman' => 'required|numeric',
//         ]);


//         $imageName = time().'.'.$request->image_tanaman->extension();  
//         $request->image_tanaman->move(public_path('images'), $imageName);
        

//         $plant = new Plants();
//         $plant->nama_tanaman = $request->nama_tanaman;
//         $plant->image_tanaman = $imageName;
//         $plant->kategori_tanaman = $request->kategori_tanaman;
//         $plant->deskripsi_tanaman = $request->deskripsi_tanaman;
//         $plant->size_tanaman = $request->size_tanaman;
//         $plant->suhu_tanaman = $request->suhu_tanaman;
//         $plant->kelembapan_tanaman = $request->kelembapan_tanaman;
//         $plant->harga_tanaman = $request->harga_tanaman;
//         $plant->stok_tanaman = $request->stok_tanaman;
//         $plant->save();

//         return redirect('/plants')->with('success', 'Tanaman telah berhasil ditambah.');
//     }

//     public function edit($id)
//     {
//         // Mengambil data tanaman berdasarkan id yang dipilih
//         $plant = Plants::findOrFail($id);
//         // Passing data tanaman yang didapat ke view edit.blade.php
//         return view('backend.plants.edit', compact('plant'));
//     }

//     public function update(Request $request, $id)
//     {
//         // Validasi input dari form
//         $request->validate([
//             'nama_tanaman' => 'required',
//             'image_tanaman' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
//             'kategori_tanaman' => 'required',
//             'deskripsi_tanaman' => 'required',
//             'size_tanaman' => 'required|numeric',
//             'suhu_tanaman' => 'required|numeric',
//             'kelembapan_tanaman' => 'required|numeric',
//             'harga_tanaman' => 'required|numeric',
//             'stok_tanaman' => 'required|numeric',
//         ]);

//         // Update data tanaman berdasarkan id
//         $plant = Plants::findOrFail($id);

//         if ($request->hasFile('image_tanaman')) {
//             // Mengunggah gambar baru jika ada
//             $imageName = time().'.'.$request->image_tanaman->extension();  
//             $request->image_tanaman->move(public_path('images'), $imageName);
//             $plant->image_tanaman = $imageName;
//         }

//         // Memperbarui data tanaman
//         $plant->nama_tanaman = $request->nama_tanaman;
//         $plant->deskripsi_tanaman = $request->deskripsi_tanaman;
//         $plant->kategori_tanaman = $request->kategori_tanaman;
//         $plant->size_tanaman = $request->size_tanaman;
//         $plant->suhu_tanaman = $request->suhu_tanaman;
//         $plant->kelembapan_tanaman = $request->kelembapan_tanaman;
//         $plant->harga_tanaman = $request->harga_tanaman;
//         $plant->stok_tanaman = $request->stok_tanaman;
//         $plant->save();

//         // Alihkan halaman ke halaman '/plants' dengan pesan sukses
//         return redirect('/plants')->with('success', 'Data Tanaman berhasil diupdate.');
//     }

//     public function hapus($id)
//     {
//         $plant = Plants::findOrFail($id);
//         $plant->delete();
        
//         return redirect('/plants')->with('success', 'Data Tanaman telah berhasil dihapus.');
//     }
// }

// END ini yang original code