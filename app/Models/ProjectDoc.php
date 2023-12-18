<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDoc extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'file',
        'project_id',
    ];

    public function getFileAttribute($value)
    {
        if ($value) {
            return  FileService::getFileUrl('files/projects/', $value);
        } else {
            return null;
        }
    }

}
