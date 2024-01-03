<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'ip_address',
        'combo',
        'combo_id',
        'campagin_id',
        'product_id',
        'price',
        'quantity',
        'total_amount',
    ];

    public function combo()
    {
        return $this->belongsTo(CampaignCombo::class,'combo_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class,'campagin_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
