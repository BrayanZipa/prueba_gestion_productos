<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductoController extends Controller
{
    /**
     * Mostrar una lista de los productos
     */
    public function index()
    {
        return view('productos');
    }

    /**
     * Función para obtener los registros paginados de los productos por medio de una consulta ajax
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function productosData(Request $request){
        if($request->ajax()){
            $query = Producto::query();

            if ($request->filled('min_precio')) {
                $query->where('precio', '>=', $request->min_precio);
            }

            if ($request->filled('max_precio')) {
                $query->where('precio', '<=', $request->max_precio);
            }

            if ($request->filled('min_total')) {
                $query->where('total', '>=', $request->min_total);
            }

            if ($request->filled('max_total')) {
                $query->where('total', '<=', $request->max_total);
            }

            return DataTables::of($query)->make(true);
        }
    }

    /**
     * Mostrar el formulario para crear un nuevo producto
     */
    public function create()
    {
        return view('productos-create');
    }

    /**
     * Almacenar un producto creado, se hace uso de los Requests de Laravel para realizar las validaciones
     * 
     * @param ProductoRequest $request
     * @return RedirectResponse
     */
    public function store(ProductoRequest $request)
    {
        $productoValidado = $request->validated();
        $productoValidado['total'] = $productoValidado['cantidad'] * $productoValidado['precio'];
        Producto::create($productoValidado);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar el formulario para editar un producto especifico
     */
    public function edit(Producto $producto)
    {
        return view('productos-create', compact('producto'));
    }

    /**
     * Actualizar un producto especifico y almacenarlo, se hace uso de los Requests de Laravel para realizar las validaciones
     * 
     * @param ProductoRequest $request
     * @param Producto $producto
     * @return RedirectResponse
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $productoValidado = $request->validated();
        $productoValidado['total'] = $productoValidado['cantidad'] * $productoValidado['precio'];
        $producto->update($productoValidado);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Eliminar un producto del almacenamiento
     * 
     * @param Producto $producto
     * @return JsonResponse
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['success' => true, 'message' => 'Producto eliminado correctamente']);
    }
}
