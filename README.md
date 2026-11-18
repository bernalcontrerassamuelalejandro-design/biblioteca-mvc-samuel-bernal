
# Biblioteca - Samuel Bernal

## Descripción
Este proyecto es una aplicación web desarrollada con Laravel 12 para administrar una biblioteca mediante el patrón de arquitectura MVC.

## Funcionalidades
- Listar libros registrados.
- Registrar nuevos libros.
- Editar información de los libros.
- Eliminar libros.
- Administrar categorías.
- Relacionar libros con categorías.
- Buscar libros por título.
- Filtrar libros por categoría.
- Validar formularios y mostrar mensajes.

## Tecnologías utilizadas
- PHP 8.2
- Laravel 12
- MySQL
- Blade
- HTML y CSS
- Git y GitHub

## Instalación y ejecución

1. Clonar el repositorio:

```bash
git clone URL_DE_TU_REPOSITORIO
```

2. Entrar a la carpeta:

```bash
cd biblioteca-samuel-bernal
```

3. Instalar dependencias:

```bash
composer install
```

4. Crear el archivo de configuración:

```bash
copy .env.example .env
```

5. Generar la llave:

```bash
php artisan key:generate
```

6. Crear la base de datos MySQL y configurar las credenciales en el archivo `.env`.

7. Ejecutar las migraciones y datos de prueba:

```bash
php artisan migrate --seed
```

8. Iniciar el servidor:

```bash
php artisan serve
```

9. Abrir en el navegador:

http://127.0.0.1:8000

## Autor
Samuel Alejandro Bernal Contreras

Proyecto académico - SENA ADSO.
