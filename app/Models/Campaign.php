<?php

namespace App\Models;

use App\Services\FileService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'target_amount',
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
            return  FileService::getFileUrl('files/campaigns/', $value);
        } else {
            return null;
        }
    }

    public function campaign_tags()
    {
        return $this->hasMany(CampaignTag::class);
    }

    public function pluck_campaign_tags()
    {
        return $this->hasMany(CampaignTag::class)->pluck('tag_id');
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
