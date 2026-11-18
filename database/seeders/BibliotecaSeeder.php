<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Libro;

class BibliotecaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Tecnología',
            'Programación',
            'Ciencia',
            'Literatura',
            'Historia'
        ];

        foreach ($categorias as $nombre) {
            Categoria::firstOrCreate(['nombre' => $nombre]);
        }

        $libros = [
            ['Laravel desde cero', 'Taylor Otwell', 2023, 'Programación'],
            ['PHP para principiantes', 'Luis Pérez', 2022, 'Programación'],
            ['Clean Code', 'Robert Martin', 2008, 'Tecnología'],
            ['Inteligencia Artificial', 'John Smith', 2024, 'Tecnología'],
            ['El universo', 'Stephen Hawking', 2018, 'Ciencia'],
            ['Breve historia del tiempo', 'Stephen Hawking', 1988, 'Ciencia'],
            ['Cien años de soledad', 'Gabriel García Márquez', 1967, 'Literatura'],
            ['El principito', 'Antoine de Saint-Exupéry', 1943, 'Literatura'],
            ['Historia de Colombia', 'Jorge Orlando Melo', 2017, 'Historia'],
            ['La segunda guerra mundial', 'Antony Beevor', 2012, 'Historia'],
        ];

        foreach ($libros as $libro) {
            Libro::firstOrCreate(
                ['titulo' => $libro[0]],
                [
                    'autor' => $libro[1],
                    'anio' => $libro[2],
                    'categoria_id' => Categoria::where('nombre', $libro[3])->first()->id,
                    'disponible' => true,
                ]
            );
        }
    }
}
