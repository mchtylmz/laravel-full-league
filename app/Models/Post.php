<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Loggable;

    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'content',
        'status',
        'is_home',
        'viewed',
        'source',
        'image_id',
        'started_at',
        'ended_at',
    ];

    public $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'status' => StatusEnum::class,
    ];

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function metas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostMeta::class);
    }
}

