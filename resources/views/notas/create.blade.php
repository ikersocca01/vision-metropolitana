<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Create Nota</h1>
<form method="post" action="{{route('nota.store')}}">
    @csrf  <!-- Protección CSRF en Laravel -->
    @method('post')
    <div>
        <label for="nombre_corto">Nombre Corto</label>
        <input type="text" id="nombre_corto" name="nombre_corto" placeholder="Nombre corto de la nota" required>
    </div>

    <div>
        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
    </div>

    <div>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título de la nota" required>
    </div>

    <div>
        <label for="encabezado">Encabezado</label>
        <textarea id="encabezado" name="encabezado" placeholder="Encabezado de la nota" required></textarea>
    </div>

    <div>
        <label for="imagen">Imagen</label>
        <input type="text" id="imagen" name="imagen" placeholder="URL de la imagen" required>
    </div>

    <div>
        <label for="categoria">Categoría</label>
        <select id="categoria" name="categoria" required>
            <option value="Educación">Educación</option>
            <option value="Política">Política</option>
            <option value="Deportes">Deportes</option>
            <option value="Cultura">Cultura</option>
            <option value="Tecnología">Tecnología</option>
            <option value="Otros">Otros</option>
        </select>
    </div>

    <div>
        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" placeholder="Contenido completo de la nota" required></textarea>
    </div>

    <div>
        <button type="submit">Guardar Nota</button>
    </div>
</form>

</body>
</html>
