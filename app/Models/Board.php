<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function members()
    {
        return $this->hasMany(BoardMember::class)
            ->where('status', StatusEnum::ACTIVE);
    }
}
