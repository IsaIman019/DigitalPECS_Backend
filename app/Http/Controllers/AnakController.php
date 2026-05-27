<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\User;

class AnakController extends Controller
{
    public function index()
    {
        $anak = User::with('ortu')
                ->where('role', 'Anak')
                ->get();
        // $ortu = Ortu::where('role', 'Orang Tua')->select('username')->get();

        return view('master-anak.index', compact('anak'));
    }
}
