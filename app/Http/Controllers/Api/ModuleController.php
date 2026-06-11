<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('nama')->get();

        return response()->json([
            'success' => true,
            'data' => $modules
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:modules,nama',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $icon = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->store('modules', 'public');
        }

        $module = Module::create([
            'nama' => $request->nama,
            'icon' => $icon,
            'created_by' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Module berhasil ditambahkan.',
            'data' => $module
        ], 201);
    }
}
