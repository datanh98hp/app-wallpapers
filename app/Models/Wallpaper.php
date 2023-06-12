<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    use HasFactory;

    protected $table = 'wallpapers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'src',
        "name",
        'category_id',
        'anonymous_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function user_like(){
        return $this->hasOne(User::class);
    }
}
