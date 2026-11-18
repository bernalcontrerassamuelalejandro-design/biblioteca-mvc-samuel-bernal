
@extends('layouts.app')

@section('content')
<h2>Editar libro</h2>

<form method="POST" action="{{ route('libros.update', $libro) }}">
    @csrf
    @method('PUT')

    <p>Título:</p>
    <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>

    <p>Autor:</p>
    <input type="text" name="autor" value="{{ old('autor', $libro->autor) }}" required>

    <p>Año:</p>
    <input type="number" name="anio" value="{{ old('anio', $libro->anio) }}" min="1500" max="{{ date('Y') }}" required>

    <p>Categoría:</p>
    <select name="categoria_id" required>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <p>
        <label>
            <input type="checkbox" name="disponible" {{ $libro->disponible ? 'checked' : '' }}>
            Disponible
        </label>
    </p>

    <button type="submit">Actualizar libro</button>
    <a href="{{ route('libros.index') }}">Cancelar</a>
</form>
@endsection
