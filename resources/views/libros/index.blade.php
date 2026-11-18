
@extends('layouts.app')

@section('content')
<h2>Catálogo de libros</h2>

<a href="{{ route('libros.create') }}" class="btn">+ Agregar libro</a>
<a href="{{ route('categorias.index') }}" class="btn">Administrar categorías</a>

<form method="GET" action="{{ route('libros.index') }}">
    <input type="text" name="buscar" placeholder="Buscar por título"
           value="{{ request('buscar') }}">

    <select name="categoria">
        <option value="">Todas las categorías</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <button type="submit">Filtrar</button>
    <a href="{{ route('libros.index') }}">Limpiar</a>
</form>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Categoría</th>
            <th>Disponibilidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($libros as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio }}</td>
                <td>{{ $libro->categoria->nombre }}</td>
                <td>{{ $libro->disponible ? 'Disponible' : 'No disponible' }}</td>
                <td>
                    <a href="{{ route('libros.edit', $libro) }}">Editar</a>

                    <form method="POST" action="{{ route('libros.destroy', $libro) }}"
                          style="display:inline"
                          onsubmit="return confirm('¿Seguro que deseas eliminar este libro?')">
                        @csrf
                        @method('DELETE')
                        <button class="danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No hay libros registrados.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $libros->links() }}
@endsection
