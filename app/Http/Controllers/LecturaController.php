<?php

namespace App\Http\Controllers;

use App\DataTables\LecturaDataTable;
use App\Models\Dispositivo;
use App\Models\Lectura;
use Illuminate\Http\Request;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LecturaDataTable $dataTable)
    {
        return $dataTable->render('lecturas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'dispositivos'=>Dispositivo::get()
        );
        return view('lecturas.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $comercio=Lectura::create($request->all());
        return redirect()->route('lecturas.index')->with('success','Lectura ingresado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lectura $lectura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lectura $lectura)
    {
        $data = array(
            'dispositivos'=>Dispositivo::get(),
            'lectura'=>$lectura
        );
        return view('lecturas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lectura $lectura)
    {
        
        $lectura->update($request->all());

        return redirect()->route('lecturas.index')->with('success','Lectura actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lectura $lectura)
    {
        try {
            $lectura->delete();
            return redirect()->route('lecturas.index')->with('success','Lectura eliminado.');
        } catch (\Throwable $th) {
            return redirect()->route('lecturas.index')->with('danger','Lectura no eliminado, '.$th->getMessage());
        }
    }
}
