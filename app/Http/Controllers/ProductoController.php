<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|integer|unique:productos',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha_creacion' => 'nullable|date',
        ]);

        Producto::create($validated);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'sku' => 'required|integer|unique:productos,sku,' . $producto->id,
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha_creacion' => 'nullable|date',
        ]);

        $producto->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
