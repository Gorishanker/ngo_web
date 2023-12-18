<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'image',
        'is_active',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/banners/', $value);
        } else {
            return null;
        }
    }

}
