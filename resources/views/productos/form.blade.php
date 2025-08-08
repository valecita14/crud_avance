<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <input type="text" name="color" class="form-control" value="{{ old('color', $producto->color ?? '') }}" required>



<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $producto->precio ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="categoria" class="form-label">Categoría</label>
    <select name="categoria" class="form-select" required>
        <option value="">Seleccione una categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>