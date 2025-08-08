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
    <h2>Crear Producto</h2>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        @include('productos.form')        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
