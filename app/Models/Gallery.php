<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file',
        'category_id',
    ];

    public function getFileAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/galleries/', $value);
        } else {
            return null;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
