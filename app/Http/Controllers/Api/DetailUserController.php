<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailUserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DetailUser;

class DetailUserController extends Controller
{
    // Menampilkan semua detail user
    public function index()
    {
        $detailUsers = DetailUser::all();
        return DetailUserResource::collection($detailUsers);
    }

    // Menampilkan detail user berdasarkan ID
    public function show($id)
    {
        $detailUser = DetailUser::findOrFail($id);
        return new DetailUserResource($detailUser);
    }

    // Menyimpan detail user baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alamat_rumah' => 'required|string',
            'no_telp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
        ]);

        $detailUser = DetailUser::create($request->all());
        return new DetailUserResource($detailUser);
    }

    // Mengupdate detail user
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alamat_rumah' => 'required|string',
            'no_telp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
        ]);

        $detailUser = DetailUser::findOrFail($id);
        $detailUser->update($request->all());
        return new DetailUserResource($detailUser);
    }

    // Menghapus detail user
    public function destroy($id)
    {
        $detailUser = DetailUser::findOrFail($id);
        $detailUser->delete();
        return response()->json(['message' => 'Detail user deleted successfully'], 200);
    }
}



// namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Controller;
// use App\Http\Resources\PenggunaResource;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use App\Models\DetailUser;

// class DetailUserController extends Controller
// {
//     // Menampilkan semua detail user
//     public function index()
//     {
//         $detailUsers = DetailUser::all();
//         return response()->json(['detail_users' => $detailUsers], 200);
//     }

//     // Menampilkan detail user berdasarkan ID
//     public function show($id)
//     {
//         $detailUser = DetailUser::findOrFail($id);
//         return response()->json(['detail_user' => $detailUser], 200);
//     }

//     // Menyimpan detail user baru
//     public function store(Request $request)
//     {
//         $request->validate([
//             'user_id' => 'required|exists:users,id',
//             'alamat_rumah' => 'required|string',
//             'no_telp' => 'required|string',
//             'tanggal_lahir' => 'required|date',
//             'jenis_kelamin' => 'required|string',
//         ]);

//         $detailUser = DetailUser::create($request->all());
//         return response()->json(['detail_user' => $detailUser], 201);
//     }

//     // Mengupdate detail user
//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'user_id' => 'required|exists:users,id',
//             'alamat_rumah' => 'required|string',
//             'no_telp' => 'required|string',
//             'tanggal_lahir' => 'required|date',
//             'jenis_kelamin' => 'required|string',
//         ]);

//         $detailUser = DetailUser::findOrFail($id);
//         $detailUser->update($request->all());
//         return response()->json(['detail_user' => $detailUser], 200);
//     }

//     // Menghapus detail user
//     public function destroy($id)
//     {
//         $detailUser = DetailUser::findOrFail($id);
//         $detailUser->delete();
//         return response()->json(['message' => 'Detail user deleted successfully'], 200);
//     }
// }
