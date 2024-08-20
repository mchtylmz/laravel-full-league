<?php

namespace App\Models;

use App\Traits\CastTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, CastTrait;

    public $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
