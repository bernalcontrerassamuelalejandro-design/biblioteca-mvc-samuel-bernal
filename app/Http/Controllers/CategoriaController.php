<?php

namespace App\Http\Controllers;



use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('libros')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|unique:categorias,nombre',
        ]);

        Categoria::create($request->only('nombre'));

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->libros()->exists()) {
            return back()->with('error', 'No puedes eliminar una categoría que tiene libros.');
        }

        $categoria->delete();

        return back()->with('success', 'Categoría eliminada correctamente.');
    }
}
