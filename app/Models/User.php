<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Topic;
use App\Models\Like;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'email',
        'password',
        'is_admin',
        'is_banned',
        'photo',
    ];

    protected $hidden = [
        'password',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
