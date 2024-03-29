<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Sluggable\Sluggable;

class Role extends Model
{
    use HasFactory, Sluggable, Loggable;

    protected string $sluggable = 'name';

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
