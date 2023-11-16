<?php

namespace App\Models;

use App\Enums\GridEnum;
use App\Enums\StatusEnum;
use App\Traits\HasPhotoBelongsTrait;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Uploader\Upload;

class BoardMember extends Model
{
    use HasFactory, Loggable, HasPhotoBelongsTrait;

    protected $fillable = [
        'board_id',
        'name',
        'surname',
        'photo',
        'mission_tr',
        'mission_en',
        'grid',
        'sort',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'grid' => GridEnum::class
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
