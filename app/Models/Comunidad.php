<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'grupo_whatsapp',
        'grupo_telegram'
    ];
    
   
}
