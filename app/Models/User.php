<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Settings\Traits\Settingable;
use Zoha\Metable;

/**
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Settingable, Loggable, HasImages, Metable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
        'login',
        'role_id',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => StatusEnum::class,
        'web' => StatusEnum::class
    ];


    /**
     * @var array[]
     */
    protected $filesOptions = [
        'images' => [
            'directory' => '/user',
            'thumbnail' => [
                'ratio'  => false,
                'width'  => 500,
                'height' => 500
            ]
        ],
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Role::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function people()
    {
        return $this->hasOne(People::class);
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return sprintf('%s %s', $this->people?->first_name, $this->people?->last_name);
    }
}
