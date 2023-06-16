<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikeWallpaper extends Model
{
    use HasFactory;


    protected $table = 'user_like_wallpaper';
    protected $primaryKey = 'id';

    protected $fillable = [
        'anonymous_id',
        "wallpaper_id"
    ];

    public function wallpapers()
    {
        return $this->morphedByMany(Wallpaper::class, 'user_like_wallpaper');
    }
    public function user()
    {
        return $this->morphedByMany(User::class, 'user_like_wallpaper');
    }
}
