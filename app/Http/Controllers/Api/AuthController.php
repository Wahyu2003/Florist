<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    // login
    public function register(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email'           => 'required|string|email|unique:users,email',
            // 'username'        => 'required|string|unique:users,username',
            'password'        => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            // 'username' => $attrs['username'],
            'password' => bcrypt($attrs['password']),
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
            
        ], 200);
    }

    
    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(!Auth::attempt($attrs))
        {
            return response([
                'message' => 'Invalid credentials'
            ], 403);
        }
            
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
            
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Loggout Success.'
        ], 200);
    }

    // get user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    public function update(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string'
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        auth()->user()->update([
            'name' => $attrs['name'],
            'image' => $image
        ]);

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }
}