<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalGuru = User::where('role', 'Guru')->count();
        $totalAnak = User::where('role', 'Anak')->count();

        return view('home', compact(
            'totalUsers',
            'totalGuru',
            'totalAnak'
        ));
    }
}
