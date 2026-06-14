<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah'
            ], 401);
        }

        $user = Auth::user();

        if ($user->status != 'ACTIVE') {

            return response()->json([
                'success' => false,
                'message' => 'Akun tidak aktif'
            ], 403);
        }

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token'   => $token,
            'user'    => [
                'id'          => $user->id,
                'username'    => $user->username,
                'email'       => $user->email,
                'role'        => $user->role,
                'orangtua_id' => $user->orangtua_id,
                'nohp'        => $user->nohp,
                'alamat'      => $user->alamat,
                'tgl_lahir'   => $user->tgl_lahir,
                'status'      => $user->status,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    } 
    public function register(Request $request)
    {
        try {

            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Orang Tua',
                'status' => 'ACTIVE',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                ]
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }
    public function profile()
    {
        $user = auth()->user();

        if ($user->role == 'Anak') {

            $user->load('ortu');

            return response()->json([
                'success' => true,
                'data' => [
                    'role' => $user->role,
                    'username' => $user->username,
                    'email' => $user->email,
                    'orang_tua' => [
                        'username' => $user->ortu?->username,
                        'nohp' => $user->ortu?->nohp,
                        'alamat' => $user->ortu?->alamat,
                    ]
                ]
            ]);
        }

        
        return response()->json([
            'success' => true,
            'data' => [
                'role' => $user->role,
                'username' => $user->username,
                'email' => $user->email,
                'nohp' => $user->nohp,
                'alamat' => $user->alamat,
            ]
        ]);
    }
    

    
}
