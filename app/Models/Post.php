<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_auth_id', 'auth_id');
    }
}
