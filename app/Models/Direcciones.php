<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $fillable = ['helbidea'];

    public function usuarios() 
    {
        return $this->belongsTo(Usuarios::class, 'user_id', 'id');
    }
}
