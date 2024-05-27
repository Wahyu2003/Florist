<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
// use App\Http\Resources\PenggunaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Tanaman;
use App\Http\Resources\PesananResource;

class PesananController extends Controller
{

    // Menampilkan semua pesanan dengan data user dan tanaman
    public function index() {
        $pesanans = Pesanan::with(['user', 'tanaman'])->get();
        return PesananResource::collection($pesanans);
    }

    // Menampilkan pesanan berdasarkan ID dengan data user dan tanaman
    public function show($id) {
        $pesanan = Pesanan::with(['user', 'tanaman'])->findOrFail($id);
        return new PesananResource($pesanan);
    }

    // Menyimpan pesanan baru
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'tanaman_id' => 'required',
            'jumlah_beli' => 'required',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::findOrFail($request->user_id);
        $tanaman = Tanaman::findOrFail($request->tanaman_id);
        $total_harga = $tanaman->harga_tanaman * $request->jumlah_beli;

        if ($request->hasFile('bukti_bayar')) {
            $bukti_bayar = $request->file('bukti_bayar');
            $bukti_bayar_new_name = time() . '.' . $bukti_bayar->getClientOriginalExtension();
            $bukti_bayar->move('uploads/bukti_bayar/', $bukti_bayar_new_name);
        } else {
            return response()->json(['error' => 'File bukti bayar tidak ditemukan'], 400);
        }

        $pesanan = new Pesanan();
        $pesanan->user_id = $request->user_id;
        $pesanan->tanaman_id = $request->tanaman_id;
        $pesanan->jumlah_beli = $request->jumlah_beli;
        $pesanan->total_harga = $total_harga;
        $pesanan->bukti_bayar = $bukti_bayar_new_name;
        $pesanan->status = 'pending'; // Atur status pesanan sesuai kebutuhan
        $pesanan->save();

        return new PesananResource($pesanan);
    }

    // Menghapus pesanan berdasarkan ID
    public function destroy($id) {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        return response()->json(['message' => 'Pesanan berhasil dihapus'], 200);
    }



    

    
}





