<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'auth_id'
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'pengguna_auth_id', 'auth_id');
    }
}
