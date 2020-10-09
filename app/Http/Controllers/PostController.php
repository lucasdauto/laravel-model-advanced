<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        echo "#{$post->id} Titutlo: {$post->title}<br>";
        echo "Subtitulo: {$post->subtitle}<br>";
        echo "Conteúdo: {$post->description} <br>";
        echo "Subtitulo: {$post->createdFmt}<br><hr>";

        $postAuthor = $post->author()->get()->first();

        if ($postAuthor) {
            echo "<h1>Dados do Usuario</h1><br>";
            echo "Nome do usuario: {$postAuthor->name}<br>";
            echo "E-mail: {$postAuthor->email}<br>";
        }

        $postCategories = $post->categories()->get();

        if ($postCategories) {
            echo "<h1>Dados do Usuario</h1><br>";
            foreach ($postCategories as $category) {
                echo "#{$category->id} Categoria: {$category->name}<br>";
            }
        }

//        Attach adiona uma nova categoria no post
//        $post->categories()->attach([3]);

//        Detach remove a categoria que você passa
//        $post->categories()->detach([3]);

//        Sincroniza a categoria apagando o que tinha antes e adionando o que tem dentro do array
//        $post->categories()->sync([5,3]);

//        $post->categories()->syncWithDetaching([4,10,8]);

        $post->comments()->create([
            "content" => "Teste de comentario 9785"
        ]);

        $comments = $post->comments()->get();

        if ($comments){
            echo "<h1>Comentarios</h1><br>";
            foreach ($comments as $comment) {
                echo "Comentario #{$comment->id}: {$comment->content}<hr>";
                echo "<small>{$comment->created_at}</small><br><br>";

            }
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
