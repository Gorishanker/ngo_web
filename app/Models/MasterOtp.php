<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterOtp extends Model
{
    use HasFactory;
    protected $fillable = [
        'mobile_no',
        'email',
        'otp',
    ];
}
