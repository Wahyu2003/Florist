<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        Log::info('Login attempt with credentials: ', $credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            Log::info('Authentication successful for: ' . $credentials['username']);
            return redirect()->intended('/admin/dashboard');
        }

        Log::warning('Authentication failed for: ' . $credentials['username']);
        return redirect()->back()->withErrors(['error' => 'Kombinasi kredensial ini tidak cocok dengan catatan kami.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
