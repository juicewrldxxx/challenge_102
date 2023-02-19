<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'description',
        'hint'
    ];
    protected $table = "challenge";

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_challenge', 'challenge_id', 'user_id');
    }


}

