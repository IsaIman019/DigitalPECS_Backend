<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ModuleItem;
use Illuminate\Http\Request;
use Illuminate\Support\FacadesStorage;

class ModuleItemController extends Controller
{
    public function index(Request $request, $module)
    {
        $request->validate([
            'anak_id' => 'required|exists:users,id',
        ]);

        $items = ModuleItem::where('module_id', $module)
            ->where('anak_id', $request->anak_id)
            ->orderBy('created_at')
            ->get()
            ->map(function ($item) {
                $item->image_url = $item->gambar
                    ? asset('storage/' . $item->gambar)
                    : null;

                return $item;
            });

        return response()->json([
            'success' => true,
            'data' => $items
        ]);
    }
    public function store(Request $request, $module)
    {
        $request->validate([
            'anak_id' => 'required|exists:users,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'text' => 'required|string|max:255',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('module-items', 'public');
        }
        $item = ModuleItem::create([
            'module_id' => $module,
            'anak_id' => $request->anak_id,
            'gambar' => $gambar,
            'text' => $request->text,
            'created_by' => auth()->id(),
        ]);

        $item->image_url = $item->gambar
            ? asset('storage/' . $item->gambar)
            : null;

        return response()->json([
            'success' => true,
            'message' => 'Item module berhasil ditambahkan.',
            'data' => $item
        ], 201);
    }
    
    public function destroy($id)
    {
        $item = ModuleItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan.'
            ], 404);
        }

        if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item module berhasil dihapus.'
        ]);
    }

}
