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
        'raise_amount',
        'total_rating',
        'average_rating',
        'price',
        'slug',
        'image',
        'author',
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

    public function campaign_combos()
    {
        return $this->hasMany(CampaignCombo::class,'campaign_id');
    }

    public function campaign_combos_with_trash()
    {
        return $this->hasMany(CampaignCombo::class,'campaign_id')->withTrashed();
    }

    public function order_item()
    {
        return $this->hasOne(OrderItem::class,'campagin_id');
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
