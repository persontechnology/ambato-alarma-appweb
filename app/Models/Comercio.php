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
        return $this->user ? $this->user->name : $this->user->email;
    }


    // obtener datos formateados de comercio
    public static function obtenerDatosFormateados($comercios)
    {
        return $comercios->map(function ($comercio) {
            return [
                'id' => $comercio->id,
                'nombre' => $comercio->nombre,
                'descripcion' => $comercio->descripcion,
                'direccion' => $comercio->direccion,
                'latitud' => $comercio->latitud,
                'longitud'=>$comercio->longitud,
                'numero_celular' => $comercio->numero_celular,
                'alarma_comunitaria_id' => $comercio->alarma_comunitaria_id,
                'foto' => route('comercios.verFoto', $comercio->id),
                'estado' => $comercio->estado,
                'user_nombre' => $comercio->user_nombre
            ];
        });
    }
}
