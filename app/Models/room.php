<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $table = "room";
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_room', 'room_id', 'user_id');
    }
    public function message()
    {
        return $this->belongsTo(message::class,'room_id');
    }
}
