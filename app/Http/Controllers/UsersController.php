<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('backend.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();
        
        return redirect('/users')->with('success', 'Data Pengguna telah berhasil dihapus.');
    }
}
