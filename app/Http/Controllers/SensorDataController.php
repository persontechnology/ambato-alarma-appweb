<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Lectura;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function sensorData(Request $request) {

        $dispositivo=Dispositivo::find($request->dispositivo_id);
        if($dispositivo){
            $lectura=Lectura::create($request->all());
            return $lectura;
        }else{
            return json_encode([
                'msj'=>'no Existe dispositivo con id. ',$request->dispositivo_id
            ]);
        }
        
    }
}
