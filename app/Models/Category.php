<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'slug', 'status', 'discription','image_path',
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return asset('images/placeholder.png');
        }

        if (stripos($this->image_path, 'http') === 0) {
            return $this->image_path;
        }

        return asset('uploads/' . $this->image_path);
    }
}
