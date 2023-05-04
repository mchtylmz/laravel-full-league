<?php

namespace App\Models;

use App\Enums\PostTypeEnum;
use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;

class Post extends Model
{
    use HasFactory, Loggable, HasImages;


    /**
     * @var string[]
     */
    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'content',
        'status',
        'featured',
        'viewed',
        'source',
        'type',
        'started_at',
        'ended_at',
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'status' => StatusEnum::class,
        'type' => PostTypeEnum::class
    ];

    /**
     * @var array[]
     */
    protected $filesOptions = [
        'images' => [
            'directory' => '/post',
            'thumbnail' => [
                'ratio'  => true,
                'width'  => 500,
                'height' => 500
            ]
        ],
    ];


    /**
     * @param $query
     * @param string $value
     * @return mixed
     */
    public function scopeType($query, string $value = 'post'): mixed
    {
        return $query->where('type', $value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostMeta::class);
    }

}

