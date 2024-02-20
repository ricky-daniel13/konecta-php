<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id','desc')->get();
        return view('productos.index', compact('productos'));
    }

    public function show(Producto $producto)
    {
        $productos = Producto::orderBy('id','desc')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit',compact('producto','categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'referencia' => 'required|max:255',
            'precio' => 'required|numeric|integer',
            'peso' => 'required|numeric|integer',
            'stock' => 'required|numeric|integer',
            'idCategoria' => 'required|numeric|integer|min:0',
        ]);
        
        Producto::create($request->post());

        return redirect()->route('productos.index')->with('success','Se creo el producto con exito.');
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'max:255',
            'referencia' => 'max:255',
            'precio' => 'numeric|integer',
            'peso' => 'numeric|integer',
            'stock' => 'numeric|integer',
            'idCategoria' => 'numeric|integer|min:0',
        ]);
        
        $producto->fill($request->post())->save();

        return redirect()->route('productos.index')->with('success','Producto Actualizado');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success','Producto Eliminado');
    }
}