<h1>{{ $publicacion->titulo }}</h1>
<p>{{ $publicacion->contenido }}</p>

<h2>Comentarios:</h2>
<ul>
    @foreach ($publicacion->comentarios as $comentario)
        <li>{{ $comentario->contenido }}</li>
    @endforeach
</ul>
