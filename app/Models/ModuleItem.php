<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class ModuleItem extends Model
{
    protected $fillable = [
        'module_id',
        'anak_id',
        'gambar',
        'text',
        'created_by',
    ];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : null;
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function anak()
    {
        return $this->belongsTo(User::class, 'anak_id');
    }
}
