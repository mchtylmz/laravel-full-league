<?php

namespace App\Models;

use App\Enums\LocaleEnum;
use App\Enums\StatusEnum;
use App\Traits\HasPhotoBelongsTrait;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Sluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Loggable, HasImages, Sluggable, HasPhotoBelongsTrait;

    protected string $sluggable = 'title';

    protected $casts = [
        'status' => StatusEnum::class,
        'lang' => LocaleEnum::class,
        'published_at' => 'datetime'
    ];

    public function type()
    {
        return $this->hasOne(PostType::class);
    }
}
