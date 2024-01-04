<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['edukia'];

    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'user_id', 'id');
    }

    public function temas() 
    {
        return $this->belongsToMany(Temas::class, 'post_tema', 'post_id', 'tema_id' );
    }
}
