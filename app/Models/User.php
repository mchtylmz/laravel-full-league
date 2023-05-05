<?php

namespace App\Models;

use App\Enums\NationalityEnum;
use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Traits\HasMetaTrait;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Settings\Traits\Settingable;

/**
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Settingable, Loggable, HasImages, HasMetaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'status',
        'login',
        'role_id',
        'type'
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
        'web' => StatusEnum::class,
        'nationality' => NationalityEnum::class,
        'type' => UserTypeEnum::class
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
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
