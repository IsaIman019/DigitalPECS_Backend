<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\ModuleItem;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index($module)
    {
        $moduleData = Module::find($module);

        if (!$moduleData) {
            return response()->json([
                'success' => false,
                'message' => 'Module tidak ditemukan.'
            ], 404);
        }

        $items = ModuleItem::where('module_id', $module)
            ->where('anak_id', auth()->id())
            ->orderBy('created_at')
            ->get();

        $previousModule = Module::where('id', '<', $moduleData->id)
            ->orderByDesc('id')
            ->first();

        $nextModule = Module::where('id', '>', $moduleData->id)
            ->orderBy('id')
            ->first();

        return response()->json([
            'success' => true,
            'data' => [
                'module' => $moduleData,
                'previous_module' => $previousModule?->id,
                'next_module' => $nextModule?->id,
                'items' => $items
            ]
        ]);
    }
}
