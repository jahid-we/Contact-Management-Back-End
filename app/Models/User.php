<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'otp',
        'role',

    ];

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function contact(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function socialLink(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }

    public function about(): HasMany
    {
        return $this->hasMany(About::class);
    }
}
