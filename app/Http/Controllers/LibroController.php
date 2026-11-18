<?php

namespace App\Http\Controllers;


use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $libros = Libro::with('categoria')
            ->when($request->categoria, function ($query, $categoria) {
                $query->where('categoria_id', $categoria);
            })
            ->when($request->buscar, function ($query, $buscar) {
                $query->where('titulo', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString();

        $categorias = Categoria::all();

        return view('libros.index', compact('libros', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'autor' => 'required',
            'anio' => 'required|integer|min:1500|max:' . date('Y'),
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anio' => $request->anio,
            'categoria_id' => $request->categoria_id,
            'disponible' => $request->has('disponible'),
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'autor' => 'required',
            'anio' => 'required|integer|min:1500|max:' . date('Y'),
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anio' => $request->anio,
            'categoria_id' => $request->categoria_id,
            'disponible' => $request->has('disponible'),
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
