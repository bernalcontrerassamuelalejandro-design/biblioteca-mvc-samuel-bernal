
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca de Samuel Bernal</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f2f5f9; color: #243247; }
        header { background: #17365d; color: white; padding: 22px; }
        nav a { color: white; margin-right: 20px; text-decoration: none; }
        main { max-width: 1100px; margin: 30px auto; padding: 20px; background: white; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #e7edf5; }
        input, select { padding: 10px; margin: 5px; }
        button, .btn { background: #1769aa; color: white; padding: 9px 14px; border: 0; border-radius: 5px; cursor: pointer; text-decoration: none; }
        .danger { background: #c0392b; }
        .success { background: #d4edda; padding: 12px; margin-bottom: 15px; }
        .error { background: #f8d7da; padding: 12px; margin-bottom: 15px; }
        footer { text-align: center; padding: 20px; color: #555; }
    </style>
</head>
<body>
<header>
    <h1>Biblioteca de Samuel Bernal</h1>
    <nav>
        <a href="{{ route('libros.index') }}">Libros</a>
        <a href="{{ route('categorias.index') }}">Categorías</a>
    </nav>
</header>
<main>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @yield('content')
</main>
<footer>
    Samuel Alejandro Bernal Contreras | Ficha 3478023 | 2026
</footer>
</body>
</html>
