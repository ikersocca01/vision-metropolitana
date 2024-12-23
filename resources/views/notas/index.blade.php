<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Notas</h1>
<div>
    @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
</div>
<div>
    <a href="{{route('nota.create')}}">Nueva nota</a>
</div>

<table border="1">
    <thead>
    <tr>
        <th>Nombre Corto</th>
        <th>Estado</th>
        <th>Título</th>
        <th>Encabezado</th>
        <th>Categoría</th>
        <th>Contenido</th>
        <th>Editar</th>
    </tr>
    </thead>
    <tbody>
    <!-- Aquí se listarán las notas -->
    @foreach ($notas as $nota)
        <tr>
            <td>{{ $nota->nombre_corto }}</td>
            <td>{{ $nota->estado }}</td>
            <td>{{ $nota->titulo }}</td>
            <td>{{ $nota->encabezado }}</td>
            <td>{{ $nota->categoria }}</td>
            <td>{{ Str::limit($nota->contenido, 50) }}</td> <!-- Limitar el contenido a 50 caracteres -->
            <td>
                <a href="{{route('nota.edit',['nota' => $nota])}}">edit </a>
            </td>
            <td>
                <form method="post" action="{{route('nota.destroy',['nota' => $nota])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
