<?php

namespace App\Http\Controllers;

use App\DataTables\ComercioDataTable;
use App\Models\Comercio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ComercioDataTable $dataTable)
    {
        return $dataTable->render('comercio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'usuarios'=>User::get()
        );

        return view('comercio.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:comercios,nombre',
        ]);

        $comercio=Comercio::create($request->all());
          

        if ($request->hasFile('foto')) {
            
            $path = Storage::putFileAs(
                'comercio/fotos', $request->file('foto'), $comercio->id.'.'.$request->file('foto')->getClientOriginalExtension()
            );
            $comercio->foto=$path;
            $comercio->save();
        }


        return redirect()->route('comercios.index')->with('success','Comercio ingresado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comercio $comercio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comercio $comercio)
    {
        $data = array(
            'usuarios'=>User::get(),
            'comercio'=>$comercio
        );

        return view('comercio.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comercio $comercio)
    {
        
        $foto_url=$comercio->foto;

        $comercio->update($request->all());

        if ($request->hasFile('foto')) {
            if(Storage::exists($foto_url??'noexiste.pngx')){
                Storage::delete($foto_url);
            }
            $path = Storage::putFileAs(
                'comercio/fotos', $request->file('foto'), $comercio->id.'.'.$request->file('foto')->getClientOriginalExtension()
            );
            $comercio->foto=$path;
            $comercio->save();
        }

        return redirect()->route('comercios.index')->with('success','Comercio actualizado.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comercio $comercio)
    {
        try {
            if($comercio->delete()){
                if(Storage::exists($comercio->foto??'noexiste.pngx')){
                    Storage::delete($comercio->foto);
                }
            }
            return redirect()->route('comercios.index')->with('success','Comercio eliminado.');
        } catch (\Throwable $th) {
            return redirect()->route('comercios.index')->with('danger','Comercio no eliminado, '.$th->getMessage());
        }
    }

    public function verFoto($id)
    {
        $comercio=Comercio::findOrFail($id);
        return Storage::get($comercio->foto);
    }
    public function descargarFoto($id)
    {
        $comercio=Comercio::findOrFail($id);
        return Storage::download($comercio->foto);
    }
}
