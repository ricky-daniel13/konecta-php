<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('id','desc')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function show(Categoria $categoria)
    {
        $categorias = Categoria::orderBy('id','desc')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);
        
        Categoria::create($request->post());

        return redirect()->route('categorias.index')->with('success','Se creo la categoria con exito.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit',compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);
        
        $categoria->fill($request->post())->save();

        return redirect()->route('categorias.index')->with('success','Actualizada categoria');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','Categoria Eliminada');
    }
}
