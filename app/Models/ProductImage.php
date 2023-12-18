<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'image',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/products/', $value);
        } else {
            return null;
        }
    }

}
