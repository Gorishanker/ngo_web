<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'ip_address',
       'payment_status',
       'donation_amount',
       'donation_type',
       'payment_id',
       'order_id',
       'payment_json',
       'first_name',
       'last_name',
       'address_1',
       'address_2',
       'city',
       'state',
       'country',
       'zipcode',
       'email',
       'mobile',
       'name_on_pan',
       'pan_number',
       'how_did_you_about_us',
    ];
}
