<?php

namespace App\Http\Controllers\Api;

use App\Events\NuevaLecturaEvent;
use App\Http\Controllers\Controller;
use App\Models\Comercio;
use App\Models\Dispositivo;
use App\Models\Lectura;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index(Request $request) {

        $dispositivo=Dispositivo::where('codigo',$request->dispositivo_id)->first();
        if($dispositivo){
            $request['dispositivo_id']=$dispositivo->id;
            $lectura=Lectura::create($request->all());
          


            $comercioFormateado = Comercio::obtenerDatosFormateados(collect([$dispositivo->comercio]))->first();
 
            // Devolver los datos del dispositivo junto con los datos formateados del comercio
           $data= [
                'lectura'=>$lectura,
                'dispositivo' => $dispositivo,
                // Otros campos del dispositivo...
                'comercio' => $comercioFormateado,
            ];

            event(new NuevaLecturaEvent($data));

            return $data;

        }else{
            return json_encode([
                'msj'=>'no Existe dispositivo con id. ',$request->dispositivo_id
            ]);
        }
        
    }
}
