<?php

namespace App\Http\Controllers;

use App\Models\Arbol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['arboles'] = Arbol::paginate(5);
        return view('arbol.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('arbol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'Calle' => 'required|string|max:100',
            'Colonia' => 'required|string|max:200',
            'CodigoPostal' => 'required|numeric',
            'Delegacion' => 'required|string|max:100',
            'Foto' => 'required|max:100000|mimes:jpeg,jpg,png',
            'Especie' => 'required|string|max:100',
            'Edad' => 'required|integer',
            'Status' => 'required|string|max:50'
        ];
        $mensaje = [
            'required' => 'La :attribute es requerida',
            'CodigoPostal.required' => 'El codigo postal es requerido',
            'Status.required' => 'El status es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosArbol = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosArbol['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Arbol::insert($datosArbol);

        return redirect('arbol')->with('mensaje', 'Arbol agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function show(Arbol $arbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $arbol = Arbol::findOrFail($id);
        return view('arbol.edit', compact('arbol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'Calle' => 'required|string|max:100',
            'Colonia' => 'required|string|max:200',
            'CodigoPostal' => 'required|numeric',
            'Delegacion' => 'required|string|max:100',
            'Especie' => 'required|string|max:100',
            'Edad' => 'required|integer',
            'Status' => 'required|string|max:50'
        ];
        $mensaje = [
            'required' => 'La :attribute es requerida',
            'CodigoPostal.required' => 'El codigo postal es requerido',
            'Status.required' => 'El status es requerido',
        ];
        if ($request->hasFile('Foto')) {
            $campos = ['Foto' => 'required|max:100000|mimes:jpeg,jpg,png'];
            $mensaje = ['Foto.required' => 'La foto es requerida'];
        }
        $this->validate($request, $campos, $mensaje);


        $datosArbol = request()->except('_token', '_method');

        if ($request->hasFile('Foto')) {
            $arbol = Arbol::findOrFail($id);
            Storage::delete('public/' . $arbol->Foto);
            $datosArbol['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Arbol::where('id', '=', $id)->update($datosArbol);
        $arbol = Arbol::findOrFail($id);
        //return view('arbol.edit', compact('arbol'));
        return redirect('arbol')->with('mensaje', 'Arbol actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $arbol = Arbol::findOrFail($id);

        if (Storage::delete('public/' . $arbol->Foto)) {
            Arbol::destroy($id);
        }
        return redirect('arbol')->with('mensaje', 'Arbol borrado');
    }
}
