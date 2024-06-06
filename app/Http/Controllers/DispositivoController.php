<?php

namespace App\Http\Controllers;

use App\DataTables\DispositivosDataTable;
use App\Models\Comercio;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DispositivosDataTable $dataTable)
    {
        return $dataTable->render('dispositivos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'comercios'=>Comercio::get()
        );

        return view('dispositivos.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'=>'required|unique:dispositivos,codigo',
        ]);

        $comercio=Dispositivo::create($request->all());
        


        return redirect()->route('dispositivos.index')->with('success','Dispositivo ingresado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispositivo $dispositivo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispositivo $dispositivo)
    {
        $data = array(
            'comercios'=>Comercio::get(),
            'dispositivo'=>$dispositivo
        );

        return view('dispositivos.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        

        $request->validate([
            'codigo'=>'required|unique:dispositivos,codigo,'.$dispositivo->id,
        ]);
        $dispositivo->update($request->all());

        return redirect()->route('dispositivos.index')->with('success','Dispositivo actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        try {
            $dispositivo->delete();
            return redirect()->route('dispositivos.index')->with('success','Dispositivo eliminado.');
        } catch (\Throwable $th) {
            return redirect()->route('dispositivos.index')->with('danger','Dispositivo no eliminado, '.$th->getMessage());
        }
    }
}
