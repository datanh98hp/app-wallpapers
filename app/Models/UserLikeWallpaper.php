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
<<<<<<< HEAD
        return $this->belongsTo(Wallpaper::class, 'wallpaper_id');
    }
    public function user()
    {
        return $this->belongsTo(Anonymous::class, 'anonymous_id');
=======
        return $this->morphedByMany(Wallpaper::class, 'user_like_wallpaper');
    }
    public function user()
    {
        return $this->morphedByMany(User::class, 'user_like_wallpaper');
>>>>>>> 814a31c770cfd3a39ddbd4acb2ea9e63de500532
    }
}
