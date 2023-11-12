<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Sluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Loggable, HasImages, Sluggable;

    protected string $sluggable = 'title';

    public function type()
    {
        return $this->hasOne(PostType::class);
    }
}
