<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'about',
        'profession',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
