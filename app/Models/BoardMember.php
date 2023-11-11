<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'status' => StatusEnum::class
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
