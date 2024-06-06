<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comercio extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'descripcion',
        'direccion',
        'latitud',
        'longitud',
        'numero_celular',
        'alarma_comunitaria_id',
        'foto',
        'estado',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNombreAttribute()
    {
        return $this->user ? $this->user->nombre : '';
    }
}
