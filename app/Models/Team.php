<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'position',
        'position',
        'personal_statement',
        'description',
        'email',
        'address',
        'facebook_url',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'is_active',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/teams/', $value);
        } else {
            return null;
        }
    }

}
