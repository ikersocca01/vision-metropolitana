<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use Illuminate\Http\Request;


class NotaController extends Controller
{
    //
    public function index(){
        $notas = Nota::all();
        return view('notas.index',['notas' => $notas]);
    }
    public function create(){
        return view('notas.create');
    }

    public function store(request $request){
        $data = $request->validate([
            'nombre_corto' => 'required|string|max:100',
            'estado' => 'required|in:Activo,Inactivo',
            'titulo' => 'required|string|max:255',
            'encabezado' => 'required|string',
            'imagen' => 'required|string|max:255',
            'categoria' => 'required|in:Educación,Política,Deportes,Cultura,Tecnología,Otros',
            'contenido' => 'required|string'
        ]);

        $newNota = Nota::create($data);

        return redirect()->route('nota.index');


    }

    public function edit(Nota $nota){
    return view('notas.edit',['nota' => $nota]);
    }

    public function update(Nota $nota, request $request){
        $data = $request->validate([
            'nombre_corto' => 'required|string|max:100',
            'estado' => 'required|in:Activo,Inactivo',
            'titulo' => 'required|string|max:255',
            'encabezado' => 'required|string',
            'imagen' => 'required|string|max:255',
            'categoria' => 'required|in:Educación,Política,Deportes,Cultura,Tecnología,Otros',
            'contenido' => 'required|string']);
        $nota -> update($data);
        return redirect()->route('nota.index')->with('success','Nota actualizada');
    }


    public function destroy(Nota $nota){
        $nota->delete();
        return redirect()->route('nota.index')->with('success','Nota eliminada con exito');
    }
}
