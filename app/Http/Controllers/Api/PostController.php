<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos todos los post o noticias
        $post = Post::all();

        return response()->json($post,200);
    }

    public function show($idpost){

        $post = Post::find($idpost);

        if(!$post){
            $data = [
                'message'=>'no se encontraron datos',
                'status'=>404
            ];

            return response()->json($data,404);
        }

        $data = [
            'post'      => $post,
            'status'    =>200
        ];

        return response()->json($data,200);
    }
/*
    public function mostrarPost_y_sus_comentarios(){
        $postRelacion = Post::find(1)->comments;
        return response()->json($postRelacion);
    }*/

    //obtenemos todos los comentarios relacionados a un post en especifico
    public function mostrarCommentPorPostID($id){

        //obteneos un JSON con los todos los comentarios asociados a esa publicación mediante un ID .
        $publicacion = Post::with('comments')->findOrFail($id);

        return response()->json($publicacion,200);
    }

    //buscamos la publicacion(Post) que posea el codigo que sea igual
    // a lo que tiene como $idpost y la columna cod_comment sea igual a 4
    //agregando más restricciones a la consulta de relación
    public function filtraCommentPorId($idpost){

        $comment = Post::find($idpost)->comments()
                    ->where('cod_comment', 4)
                    ->first();

        return response()->json($comment,200);
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

    /*
      Display the specified resource.

    public function show(Post $post)
    {

    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
