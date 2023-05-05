<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

/**
 *
 */
class Category extends Model
{
    use HasFactory, Loggable, HasImages, Metable;

    /**
     * @var string[]
     */
    public $fillable = [
        'name',
        'slug',
        'description'
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'status' => StatusEnum::class
    ];


    /**
     * @var array[]
     */
    protected $filesOptions = [
        'images' => [
            'directory' => '/category',
            'thumbnail' => [
                'ratio'  => true,
                'width'  => 500,
                'height' => 500
            ]
        ],
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }
}
