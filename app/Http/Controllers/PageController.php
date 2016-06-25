<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        // Pega todos os posts com os mais atuais primeiro usando a paginação
        // do laravel pra simplificar
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('home', array(
            'posts' => $posts,
            'title' => 'Todos os posts'));
    }
}
