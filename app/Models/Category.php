<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Loggable;

    public $fillable = [
        'image_id',
        'name',
        'slug',
        'description'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
