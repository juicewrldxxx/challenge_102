<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asm extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_name_hash',
        'status',
        'file_name'
    ];
    protected $table = "asm";

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_asm', 'asm_id', 'user_id');
    }
}
