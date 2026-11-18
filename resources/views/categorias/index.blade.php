
@extends('layouts.app')

@section('content')

<h2>Administrar categorías</h2>

<h3>Agregar categoría</h3>

<form method="POST" action="{{ route('categorias.store') }}">
    @csrf

    <input
        type="text"
        name="nombre"
        placeholder="Nombre de la categoría"
        required
    >

    <button type="submit">Guardar categoría</button>
</form>

<h3>Listado de categorías</h3>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad de libros</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>

                <td>{{ $categoria->libros_count }}</td>

                <td>
                    @if($categoria->libros_count == 0)
                        <form method="POST"
                              action="{{ route('categorias.destroy', $categoria) }}">
                            @csrf
                            @method('DELETE')

                            <button class="danger">Eliminar</button>
                        </form>
                    @else
                        Tiene libros registrados
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
