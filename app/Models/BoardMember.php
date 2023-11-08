<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'photo',
        'position_tr',
        'position_en',
        'grid',
        'sort',
        'status',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
