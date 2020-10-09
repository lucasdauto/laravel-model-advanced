<?php

namespace App\Http\Controllers;


use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);

        echo "<h1>Dados do Usuario</h1><br>";
        echo "Nome do usuario: {$user->name}<br>";
        echo "E-mail: {$user->email}<br>";

        $userAddress = $user->addressDelivery()->get()->first();

        if ($userAddress) {
            echo "<h1>Endereço do Usuario:</h1><br>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement} CEP: {$userAddress->zipcode} <br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state} <br>";
        }

//        $address1 = new Address([
//            'address' => 'Rua do Lobos 2',
//            'number' => '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'Vida',
//            'state' => 'VD'
//        ]);
//
//        $address = new Address();
//        $address->address = "Rua dos Bobos 2";
//        $address->number = "0";
//        $address->complement = "Casa 1";
//        $address->zipcode = "55562-120";
//        $address->city = "Canção Infantil";
//        $address->state = "CS";


//        $user->addressDelivery()->save($address);

//        $user->addressDelivery()->saveMany([$address1,$address]);

//        $user->addressDelivery()->create([
//            'address' => 'Rua do Lobos 2',
//            'number' => '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'Vida',
//            'state' => 'VD'
//        ]);

//        $user->addressDelivery()->createMany([
//            [
//                'address' => 'Rua do Lobos 6',
//                'number' => '0',
//                'complement' => 'Apto 123',
//                'zipcode' => '88000-000',
//                'city' => 'Vida',
//                'state' => 'VD'
//            ], [
//                'address' => 'Rua do Lobos 5',
//                'number' => '0',
//                'complement' => 'Apto 123',
//                'zipcode' => '88000-000',
//                'city' => 'Vida',
//                'state' => 'VD'
//            ]
//        ]);

        $posts = $user->posts()->orderBy('id', 'DESC')->get();

        if ($posts) {
            echo "<h1>Artigos:</h1><br>";
            foreach ($posts as $post) {
                echo "#{$post->id} Titutlo: {$post->title}<br>";
                echo "Subtitulo: {$post->subtitle}<br>";
                echo "Conteúdo: {$post->description} <br> <hr>";
            }
        }

//        $comments = $user->commentsOnMyPost()->get();
//
//        if ($comments) {
//            echo "<h1>Comentários nos meus Artigos</h1>";
//            foreach ($comments as $comment) {
//                echo "Post: #{$comment->post} - User: #{$comment->user} - {$comment->content} <br>";
//            }
//        }

//        $user->comments()->create([
//            "content" => "Teste de comentario no modelo de usuario"
//        ]);

        $comments = $user->comments()->get();

        if ($comments){
            echo "<h1>Comentarios</h1><br>";
            foreach ($comments as $comment) {
                echo "Comentario #{$comment->id}: {$comment->content}<hr>";
                echo "<small>{$comment->created_at}</small><br><br>";

            }
        }

        $students = User::students()->get();

        if ($students){
            echo "<h1>Alunos</h1>";

            foreach ($students as $student){
                echo "Nome do usuario: {$student->name}<br>";
                echo "E-mail: {$student->email}<br>";
            }
        }

        $admins = User::admins()->get();

        if ($admins){
            echo "<h1>Administradores</h1>";

            foreach ($admins as $admin){
                echo "Nome do usuario: {$admin->name}<br>";
                echo "E-mail: {$admin->email}<br>";
            }
        }

        $users = User::all();

        var_dump($users->makeVisible('created_at')->toArray());
        var_dump($users->makeHidden('created_at')->toJson(JSON_PRETTY_PRINT));
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
