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
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('home', array(
            'posts' => $posts,
            'title' => 'Todos os posts'));
    }

    public function show()
    {
        $pid = Shortids::decode(Input::get('pid'));
        $post = Post::find($pid)->first();

        if (!$pid || !$post)
            abort(404);

        return view('post', array(
            'post' => $post,
            'title' => $post->title
        ));
    }

    public function search()
    {
        $search_pattern = Input::get('search');

        if ($search_pattern == '') {
            return $this->index();
        }

        $results = null;

        if ( Auth::user()->hasRole(User::CONTADOR) ) {
            $results = Pessoa::where('idContador', $idP)->
            where(function($query) use ($search_pattern) {
                $query->where('razaoSocial', 'LIKE', "%$search_pattern%")->
                orWhere('nomeFantasia', 'LIKE', "%$search_pattern%")->
                orWhere('cpfCnpj', 'LIKE', "%$search_pattern%");
            })->paginate(10);
        } else {
            $results = Pessoa::where('razaoSocial', 'LIKE', "%$search_pattern%")->
            orWhere('nomeFantasia', 'LIKE', "%$search_pattern%")->
            orWhere('cpfCnpj', 'LIKE', "%$search_pattern%")
                ->paginate(10);
        }

        return view('pessoas.read', array(
            'section'=>'Pessoas',
            'title' => 'Busca por pessoas',
            'search' => $search_pattern,
            'search_results'=> $results ) );
    }
}
