<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address',
        'total_price',
        'payment_status',
        'payment_json',
        'payment_date',
        'transaction_dt',
        'transaction_dt',
        'payment_token',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
