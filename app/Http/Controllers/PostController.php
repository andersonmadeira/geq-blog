<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Shortids;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Exibe um post, single post page. Exibe o post completo.
     */
    public function show()
    {
        $pid = Shortids::decode(Input::get('pid'));
        $post = Post::find($pid)->first();

        // Verifica se não foi informado id, se não conseguiu decriptar ou se o post
        // com essa id não existe. Se sim para algum desses, manda página 404 não encontrado
        if (!$pid || !$post)
            abort(404);

        return view('post', array(
            'post' => $post,
            'title' => $post->title
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Exibe todos os posts paginando de 10 em 10.
     */
    public function read()
    {
        // pega os posts paginando
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.read', array(
            'title' => 'Lista de posts',
            'posts' => $posts,
            'section' => 'Posts'));
    }
}
