<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'nama',
        'icon',
        'created_by',
    ];

    public function items()
    {
        return $this->hasMany(ModuleItem::class);
    }
}
