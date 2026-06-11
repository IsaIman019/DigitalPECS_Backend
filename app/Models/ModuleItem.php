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

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function anak()
    {
        return $this->belongsTo(User::class, 'anak_id');
    }
}
