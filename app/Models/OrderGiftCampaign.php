<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderGiftCampaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'occasion',
        'campaign_id',
        'name',
        'email',
        'from',
        'title',
        'message',
        'delivery_date',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class,'campaign_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
