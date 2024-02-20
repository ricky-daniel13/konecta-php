<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::orderBy('id','desc')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function show(Venta $venta)
    {
        $ventas = Venta::orderBy('id','desc')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|numeric|integer|min:1',
            'idProducto' => 'required|numeric|integer|min:0',
        ]);
        

        $producto = (Producto::where('id', $request->idProducto)->get())[0];
        //$request->merge(['precioHist' => $producto->precio]);

        if($producto->stock>=$request->post()['cantidad']){
            
            Producto::where('id', $request->idProducto)->decrement('stock', $request->post()['cantidad']);
            //$producto->save();
            $ventaCreate = $request->post();
            $ventaCreate["precioHist"] = $producto->precio;

            Venta::create($ventaCreate);
    
            return redirect()->route('ventas.index')->with('success','Venta registrada');
        }
        else{
            return redirect()->route('ventas.index')->withErrors(['No hay suficiente inventario de '.$producto->nombre]);
        }

        
    }
}