<?php

namespace App\Http\Controllers;

use App\Http\Clases\ValidadorEc;
use App\Models\Comercio;
use App\Models\Dispositivo;
use App\Models\Lectura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kutia\Larafirebase\Facades\Larafirebase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'comercios'=>Comercio::get()
        );
        return view('home',$data);
    }

    public function validarec(Request $request)
    {
        $validatorEC = new ValidadorEc();
        $res= $validatorEC->validarIdentificacion($request->identificacion);
        return json_encode($res);
    }

    public function buscarDispositivos(Request $request)
    {
        $search = $request->get('search');
    
        $query = Dispositivo::query(); 
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where(DB::raw("CONCAT(codigo, ' ',nombre )"), 'LIKE', "%{$search}%")
                  ->orWhereHas('comercio', function ($q) use ($search) {
                      $q->where('nombre', 'LIKE', "%{$search}%");
                  });
            });
        }
        
        
         // Cargar los dispositivos junto con los datos del comercio relacionado
         $dispositivos = $query->with('comercio')->take(15)->get();

         // Mapear y formatear los datos
         $dispositivosFormateados = $dispositivos->map(function ($dispositivo) {
             // Obtener los datos del comercio y formatearlos
             $comercioFormateado = Comercio::obtenerDatosFormateados(collect([$dispositivo->comercio]))->first();
 
             // Devolver los datos del dispositivo junto con los datos formateados del comercio
             return [
                 'dispositivo' => $dispositivo,
                 // Otros campos del dispositivo...
                 'comercio' => $comercioFormateado,
             ];
         });
 
         return response()->json($dispositivosFormateados);
    }
    
}
