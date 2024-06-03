<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Egulias\EmailValidator\Parser\Comment as ParserComment;
use Egulias\EmailValidator\Warning\Comment as WarningComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * mostramos todos los comentarios de nuestra tabla
     */
    public function index()
    {
        //buscamos el comentario #1
        $comment = Comment::all();

        //extraemos unicamente el titulo
        //$result=$comment->post->titulo;

        return response()->json($comment,200);
    }

    public function show($codcomment){

        $comment = Comment::find($codcomment);

        return response()->json($comment,200);
    }

    //Esto permite que, dado el ID de un comentario, podamos obtener la publicación a la que pertenece el comentario proporcionado.
    public function obtener_publicacion_comentarioId($codComment){

        $comentario = Comment::find($codComment);
        $publicacion = $comentario ->post; // Accede a la publicación asociada

        return response()->json($publicacion,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
