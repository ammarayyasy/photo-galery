<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::updating(function ($file) {
            if ($file->isDirty('path')) {
                Storage::disk('public')->delete($file->getOriginal('path'));
            }
        });

        static::deleting(function ($file) {
            Storage::disk('public')->delete($file->path);
        });
    }

}
