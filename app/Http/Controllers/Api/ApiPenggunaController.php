<?php

namespace App\Http\Controllers\Api;
use App\Models\User_Pengguna;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenggunaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiPenggunaController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts_pengguna = User_Pengguna::latest()->paginate(5);

        //return collection of posts as a resource
        return new PenggunaResource(true, 'List Data Posts', $posts_pengguna);
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama_lengkap'    => 'required',
            'foto_profil'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jenis_kelamin'   => 'required',
            'tanggal_lahir'   => 'required',
            // 'username'        => 'required',
            'password'        => 'required',
            'email'           => 'required',
            'alamat_rumah'    => 'required',
            'no_telp'         => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $foto_profil = $request->file('foto_profil');
        $foto_profil->storeAs('public/posts_foto', $foto_profil->hashName());

        //create post
        $posts_pengguna = User_Pengguna::create([
            'nama_lengkap'    => $request->nama_lengkap,
            'foto_profil'     => $foto_profil->hashName(),
            'jenis_kelamin'   => $request->jenis_kelamin,
            'tanggal_lahir'   => $request->tanggal_lahir,
            // 'username'        => $request->username,
            'password'        => $request->password,
            'email'           => $request->email,
            'alamat_rumah'    => $request->alamat_rumah,
            'no_telp'         => $request->no_telp,
        ]);

        //return response
        return new PenggunaResource(true, 'Data Post Berhasil Ditambahkan!', $posts_pengguna);
    }
        /**
     * show
     *
     * @param  mixed $id_user
     * @return void
     */

    public function show($id_user)
    {
        // Temukan pengguna berdasarkan ID
        $posts_pengguna = User_Pengguna::find($id_user);

        // Kembalikan data pengguna tunggal sebagai sumber daya
        return new PenggunaResource(true, 'Detail Data Pengguna!', $posts_pengguna);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id_user)
    {

        //find post by ID
        $posts_pengguna = User_Pengguna::find($id_user);

        //delete image
        Storage::delete('public/posts_foto/'.basename($posts_pengguna->foto_profil));

        //delete post
        $posts_pengguna->delete();

        //return response
        return new PenggunaResource(true, 'Data Post Berhasil Dihapus!', null);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id_user)
{
    //define validation rules
    $validator = Validator::make($request->all(), [
        'nama_lengkap'    => 'required',
        'foto_profil'     => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'jenis_kelamin'   => 'required',
        'tanggal_lahir'   => 'required',
        // 'username'        => 'required',
        'password'        => 'required',
        'email'           => 'required',
        'alamat_rumah'    => 'required',
        'no_telp'         => 'required',
    ]);

    //check if validation fails
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    //find post by ID
    $posts_pengguna = User_Pengguna::find($id_user);

    //check if image is not empty
    if ($request->hasFile('foto_profil')) {

        //upload image
        $foto_profil = $request->file('foto_profil');
        $foto_profil->storeAs('public/posts_foto', $foto_profil->hashName());

        //delete old image
        Storage::delete('public/posts_foto/' . basename($posts_pengguna->foto_profil));

        //update post with new image
        $posts_pengguna->update([
            'nama_lengkap'    => $request->input('nama_lengkap'),
            'foto_profil'     => $foto_profil->hashName(),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'tanggal_lahir'   => $request->input('tanggal_lahir'),
            // 'username'        => $request->input('username'),
            'password'        => $request->input('password'),
            'email'           => $request->input('email'),
            'alamat_rumah'    => $request->input('alamat_rumah'),
            'no_telp'         => $request->input('no_telp'),
        ]);
    } else {

        //update post without image
        $posts_pengguna->update([
            'nama_lengkap'    => $request->input('nama_lengkap'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'tanggal_lahir'   => $request->input('tanggal_lahir'),
            // 'username'        => $request->input('username'),
            'password'        => $request->input('password'),
            'email'           => $request->input('email'),
            'alamat_rumah'    => $request->input('alamat_rumah'),
            'no_telp'         => $request->input('no_telp'),
        ]);
    }

    //return response
    return new PenggunaResource(true, 'Data Post Berhasil Diubah!', $posts_pengguna);
}

public function sendImage() {
    return response()->file(public_path('/storage/icon_aplikasi.png'));
}
}
    




