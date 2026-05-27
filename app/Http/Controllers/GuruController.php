<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::where('role', 'Guru')->get();

        return view('master-guru.index', compact('guru'));
    }

    public function destroy($id)
    {
        $guru = User::findOrFail($id);

        // Prevent delete SuperAdmin
        if ($guru->role == 'SuperAdmin') {

            return redirect('/master-guru')
                ->with('error', 'SuperAdmin tidak bisa dihapus');
        }

        try {

            $guru->delete();

            return redirect('/master-guru')
                ->with('success', 'Data guru berhasil dihapus');

        } catch (\Exception $e) {

            return redirect('/master-guru')
                ->with('error', 'Data guru gagal dihapus');
        }
    }
}
