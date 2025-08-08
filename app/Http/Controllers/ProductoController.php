<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar lista de productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create',['categorias' => $categorias]);
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'regex:/^[a-zA-Z\s]+$/u'],
            'descripcion' => ['required', 'regex:/^[a-zA-Z\s]+$/u'],
            'color' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/u', 'max:50'],
            'precio' => ['required', 'numeric', 'min:0.01'],
            'stock' => ['required', 'integer', 'min:1'],
            'categoria' => [],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.regex' => 'La descripción solo puede contener letras y espacios.',
            'color.required' => 'El color es obligatorio.',
            'color.max' => 'El color no puede exceder los 50 caracteres.',
            'color.regex' => 'El color solo puede contener letras.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser mínimo 1.',
            'categoria' => 'La categoría es obligatoria.',
            ]);

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->color = $request->input('color');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->categoria_id = $request->input('categoria');
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar producto específico
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar formulario de edición
  public function edit(Producto $producto)
{
    return view('productos.edit', [
        'producto' => $producto,
        'categorias' => Categoria::all()
    ]);
}



    // Actualizar producto
   public function update(Request $request, Producto $producto)
{
    // ... validación
    $producto->nombre = $request->input('nombre');
    $producto->descripcion = $request->input('descripcion');
    $producto->color = $request->input('color');
    $producto->precio = $request->input('precio');
    $producto->stock = $request->input('stock');
    $producto->categoria_id = $request->input('categoria');
    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
}


    // Eliminar producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
