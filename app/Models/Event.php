<?php

namespace App\Models;

use App\Services\FileService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'category_id',
        'slug',
        'image',
        'author',
        'date',
        'content',
        'address',
        'lat',
        'lng',
        'is_active',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/events/', $value);
        } else {
            return null;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
