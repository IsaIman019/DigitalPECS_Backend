<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('master-users.index', compact('users'));
    }

    public function create()
    {
        $orangTua = User::where('role', 'Orang Tua')->get();
        // dd($orangTua);
        return view('master-users.create', compact('orangTua'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|same:password_confirmation',
            'role'          => 'required',
            'alamat'        => 'required',
            'status'        => 'required',
            'tgl_lahir'     => 'nullable|date',
            'nohp'          => 'nullable|string|max:20',
            'orangtua_id'   => 'nullable'
        ], [
            'password.same' => 'Konfirmasi password tidak sama.'
        ]);

        if ($request->role == 'Anak' && empty($request->orangtua_id)) {

            return back()
                    ->withErrors([
                        'orangtua_id' => 'Orang tua wajib dipilih untuk role Anak.'
                    ])
                    ->withInput();
        }

        User::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
            'nohp'          => $request->nohp,
            'alamat'        => $request->alamat,
            'tgl_lahir'     => $request->tgl_lahir,
            'status'        => $request->status,
            'orangtua_id'   => $request->orangtua_id
        ]);

        return redirect('/master-users')
                ->with('success', 'User berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $orangTua = User::where('role', 'Orang Tua')->get();

        return view('master-users.edit', compact('user', 'orangTua'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username'      => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'role'          => 'required',
            'alamat'        => 'required',
            'status'        => 'required',
            'tgl_lahir'     => 'nullable|date',
            'nohp'          => 'nullable|string|max:20',
            'orangtua_id'   => 'nullable'
        ]);

        if ($request->role == 'Anak' && empty($request->orangtua_id)) {

            return back()
                    ->withErrors([
                        'orangtua_id' => 'Orang tua wajib dipilih untuk role Anak.'
                    ])
                    ->withInput();
        }

        $data = [
            'username'      => $request->username,
            'email'         => $request->email,
            'role'          => $request->role,
            'nohp'          => $request->nohp,
            'alamat'        => $request->alamat,
            'tgl_lahir'     => $request->tgl_lahir,
            'status'        => $request->status,
            'orangtua_id'   => $request->orangtua_id
        ];

        if ($request->password) {

            $request->validate([
                'password' => 'same:password_confirmation|min:6'
            ]);

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/master-users')
                ->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent delete SuperAdmin
        if ($user->role == 'SuperAdmin') {

            return redirect('/master-users')
                ->with('error', 'SuperAdmin tidak bisa dihapus');
        }

        try {

            $user->delete();

            return redirect('/master-users')
                ->with('success', 'Data user berhasil dihapus');

        } catch (\Exception $e) {

            return redirect('/master-users')
                ->with('error', 'Data user gagal dihapus');
        }
    }


}
