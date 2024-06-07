<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lectura extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'valor',
        'bateria',
        'visto',
        'dispositivo_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($lectura) {
            // Incrementar el contador_notificaciones del dispositivo asociado a la lectura
            $dispositivo = $lectura->dispositivo;
            $dispositivo->contador_notificaciones=$dispositivo->contador_notificaciones+1;
            $dispositivo->save();
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }


    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class);
    }
        
    
        
        
}
