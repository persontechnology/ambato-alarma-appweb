<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo;
use App\Models\Lectura;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index(Request $request) {

        $dispositivo=Dispositivo::where('codigo',$request->dispositivo_id)->first();
        if($dispositivo){
            $request['dispositivo_id']=$dispositivo->id;
            $request['visto']=false;
            $lectura=Lectura::create($request->all());
            return $lectura;
        }else{
            return json_encode([
                'msj'=>'no Existe dispositivo con id. ',$request->dispositivo_id
            ]);
        }
        
    }
}
