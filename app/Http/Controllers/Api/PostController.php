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


    public function mostrarCommentPorId($id){

        //obteneos un JSON con los todos los comentarios asociados a esa publicación mediante un ID .
        $commnetId = Post::find($id)->comments;

        return response()->json($commnetId,200);
    }


    public function filtraCommentPorId($id){

        $comment = Post::find($id)->comments()
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

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

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
