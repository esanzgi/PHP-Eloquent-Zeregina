<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    use HasFactory;

    protected $fillable = ['tema_izena'];

    public function posts() 
    {
        return $this->belongsToMany(Posts::class, 'post_tema', 'tema_id', 'post_id');
    }
}
