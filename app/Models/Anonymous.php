<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anonymous extends Model
{
    use HasFactory;

    protected $table = 'anonymous';
    protected $primaryKey = 'id';

    protected $fillable = [
        'device_code',
        'name',
        'sex',
        'verify_code',
        'dateOfBirth',
    ];

    public function wallpaper_likes()
    {
        return $this->hasMany(Wallpaper::class);
    }
}
