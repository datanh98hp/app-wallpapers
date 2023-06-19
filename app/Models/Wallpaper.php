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
    public function users_like_wallpaper(){
        return $this->morphToMany(User::class, 'user_like_wallpaper');
    }

}
