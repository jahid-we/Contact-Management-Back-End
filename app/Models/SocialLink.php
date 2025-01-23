<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'twitterLink',
        'githubLink',
        'linkedinLink',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
