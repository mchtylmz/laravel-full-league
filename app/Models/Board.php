<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\HasPhotoBelongsTrait;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Uploader\Upload;

class Board extends Model
{
    use HasFactory, Loggable, HasPhotoBelongsTrait;

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function members()
    {
        return $this->hasMany(BoardMember::class);
    }
}
