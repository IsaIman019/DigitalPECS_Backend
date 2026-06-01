<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function listAnak(Request $request)
    {
        $user = $request->user();

        if ($user->role != 'Orang Tua') {

            return response()->json([
                'success' => false,
                'message' => 'Hanya untuk role Orang Tua'
            ], 403);

        }

        $anak = User::where('role', 'Anak')
                    ->where('orangtua_id', $user->id)
                    ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data anak berhasil diambil',
            'data' => $anak
        ]);
    }
    public function listSiswa(Request $request)
    {
        $user = $request->user();

        if ($user->role != 'Guru') {

            return response()->json([
                'success' => false,
                'message' => 'Hanya untuk role Guru'
            ], 403);

        }

        $siswa = User::where('role', 'Anak')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil diambil',
            'data' => $siswa
        ]);
    }   
    public function store(Request $request)
    {
        try {

            $userLogin = $request->user();

            if (!in_array($userLogin->role, ['Orang Tua', 'Guru'])) {

                return response()->json([
                    'success' => false,
                    'message' => 'Tidak memiliki akses'
                ], 403);

            }

            $rules = [
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'nohp' => 'nullable|string|max:20',
                'alamat' => 'nullable|string',
                'tgl_lahir' => 'nullable|date',
            ];

            if ($userLogin->role == 'Guru') {

                $rules['orangtua_id'] = [
                    'required',
                    Rule::exists('users', 'id')
                ];

            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);

            }

            $orangTuaId = $userLogin->role == 'Orang Tua'
                ? $userLogin->id
                : $request->orangtua_id;

            $anak = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Anak',
                'orangtua_id' => $orangTuaId,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'tgl_lahir' => $request->tgl_lahir,
                'status' => 'ACTIVE',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data anak berhasil ditambahkan',
                'data' => $anak
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);

        }
    }
    
    public function listOrangTua(Request $request)
    {
        $user = $request->user();

        if ($user->role != 'Guru') {

            return response()->json([
                'success' => false,
                'message' => 'Hanya untuk Guru'
            ], 403);

        }

        $orangTua = User::where('role', 'Orang Tua')
            ->where('status', 'ACTIVE')
            ->select(
                'id',
                'username',
                'email',
                'nohp',
                'alamat'
            )
            ->orderBy('username')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data orang tua berhasil diambil',
            'data' => $orangTua
        ]);
    }

    public function detail(Request $request, $id)
    {
        try {

            $userLogin = $request->user();

            $anak = User::where('id', $id)
                        ->where('role', 'Anak')
                        ->first();

            if (!$anak) {

                return response()->json([
                    'success' => false,
                    'message' => 'Data anak tidak ditemukan'
                ], 404);

            }

            if (
                $userLogin->role == 'Orang Tua'
                && $anak->orangtua_id != $userLogin->id
            ) {

                return response()->json([
                    'success' => false,
                    'message' => 'Tidak memiliki akses'
                ], 403);

            }

            if (!in_array($userLogin->role, ['Orang Tua', 'Guru'])) {

                return response()->json([
                    'success' => false,
                    'message' => 'Tidak memiliki akses'
                ], 403);

            }

            $orangTua = null;

            if ($anak->orangtua_id) {

                $orangTua = User::select(
                        'id',
                        'username',
                        'email',
                        'nohp'
                    )
                    ->find($anak->orangtua_id);

            }

            return response()->json([
                'success' => true,
                'message' => 'Detail anak berhasil diambil',
                'data' => [
                    'id' => $anak->id,
                    'username' => $anak->username,
                    'email' => $anak->email,
                    'role' => $anak->role,
                    'orangtua_id' => $anak->orangtua_id,
                    'nohp' => $anak->nohp,
                    'alamat' => $anak->alamat,
                    'tgl_lahir' => $anak->tgl_lahir,
                    'status' => $anak->status,
                    'orang_tua' => $orangTua
                ]
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    public function destroy(Request $request, $id)
    {
        // dd($id);
        $userLogin = $request->user();

        $anak = User::where('id', $id)
            ->where('role', 'Anak')
            ->first();

        if (!$anak) {

            return response()->json([
                'success' => false,
                'message' => 'Data anak tidak ditemukan'
            ], 404);

        }

        if (
            $userLogin->role == 'Orang Tua'
            && $anak->orangtua_id != $userLogin->id
        ) {

            return response()->json([
                'success' => false,
                'message' => 'Tidak memiliki akses'
            ], 403);

        }

        if (!in_array($userLogin->role, ['Guru', 'Orang Tua'])) {

            return response()->json([
                'success' => false,
                'message' => 'Tidak memiliki akses'
            ], 403);

        }

        $anak->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data anak berhasil dihapus'
        ]);
    }

}
