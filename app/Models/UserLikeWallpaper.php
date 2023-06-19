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
        return $this->belongsTo(Wallpaper::class, 'wallpaper_id');
    }
    public function user()
    {
        return $this->belongsTo(Anonymous::class, 'anonymous_id');
    }
}
