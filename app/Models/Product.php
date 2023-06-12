<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'age',
        'country',
        'video_src',
        'category_id',
        'description'
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}