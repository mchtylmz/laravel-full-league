<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Uploader\Upload;

class Sponsor extends Model
{
    use HasFactory, Loggable;

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function photo()
    {
        return $this->belongsTo(Upload::class, 'upload_id');
    }
}
