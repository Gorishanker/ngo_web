<?php

namespace App\Models;

use App\Services\FileService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'slug',
        'image',
        'author',
        'schedule_datetime',
        'content',
        'is_active',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/blogs/', $value);
        } else {
            return null;
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength' => 255,
                'method'  => null,
                'separator' => '-',
                'unique' => true,
                'onUpdate' => false,
            ]
        ];
    }

}
