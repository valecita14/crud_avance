@extends('layouts.app')

@section('content')

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Errores en el formulario',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonColor: '#d33'
        });
    </script>
@endif

<div class="container mt-4">
    <h2>Editar Producto</h2>
    <form action="{{ url('productos/' .$producto->id) }}" method="POST">
        @method('PUT')
        @csrf
        
        

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre}}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control" required>{{$producto->descripcion }}</textarea>
</div>

<div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <input type="text" name="color" class="form-control" value="{{ $producto->color }}" required>



<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio}}" required>
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control" value="{{    $producto->stock }}" required>
</div>

<div class="mb-3">
    <label for="categoria" class="form-label">Categoría</label>
    <select name="categoria" class="form-select" required>
        <option value="">Seleccione una categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" 
    @if ($categoria->id == $producto->categoria_id) selected @endif>
    {{ $categoria->nombre }}
</option>

        @endforeach
    </select>



        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
