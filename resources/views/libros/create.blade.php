
@extends('layouts.app')

@section('content')
<h2>Agregar un libro</h2>

<form method="POST" action="{{ route('libros.store') }}">
    @csrf

    <p>Título:</p>
    <input type="text" name="titulo" value="{{ old('titulo') }}" required>

    <p>Autor:</p>
    <input type="text" name="autor" value="{{ old('autor') }}" required>

    <p>Año:</p>
    <input type="number" name="anio" value="{{ old('anio') }}" min="1500" max="{{ date('Y') }}" required>

    <p>Categoría:</p>
    <select name="categoria_id" required>
        <option value="">Seleccionar categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>

    <p><label><input type="checkbox" name="disponible" checked> Disponible</label></p>

    <button type="submit">Guardar libro</button>
    <a href="{{ route('libros.index') }}">Cancelar</a>
</form>
@endsection
