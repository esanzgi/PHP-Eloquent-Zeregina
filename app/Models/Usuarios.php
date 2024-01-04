<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['izena'];

    public function direcciones()
    {
        return $this->hasOne(Direcciones::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id', 'id');
    }
}
