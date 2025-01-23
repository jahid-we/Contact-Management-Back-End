<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title', 'details', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
