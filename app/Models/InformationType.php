<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\Scope\StatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime'
        ];
    }

    public function informations(): HasMany
    {
        return $this->hasMany(Information::class, 'type_id', 'id');
    }
}
