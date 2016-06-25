<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Shortids;
use Input;

class UserController extends Controller
{
    /**
     * Mostra a página inicial que contem todos os posts
     *
     * @return Response
     */
    public function index($id = null) {

        $users = User::paginate(10);

        return view('users.read', array(
            'section'=>'Usuários',
            'title' => 'Lista de Usuários',
            'search' => '',
            'users'=> $users) );
    }

    /**
     * Envia de volta a página de edição do usuário
     */
    public function edit_get()
    {
        $uid = Shortids::decode(Input::get('uid'));
        $user = User::find($uid)->first();

        // Sempre verificando se a id existe, se é válida e se o user existe.
        if (!$uid || !$user)
            abort(404);

        return view('users.edit', array(
            'title' => 'Editar usuário',
            'section' => 'Editar usuário',
            'user' => $user));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Esse método vai persistir as edições do usuário. Ele vai receber os dados
     * do form através da request.
     * TODO: Criar uma custom request para validar os dados enviados do form,
     * dessa maneira, se os dados forem válidos, vai aparecer os erros customizados
     * que eu definir em 'messages' na custom request. Esse método nem vai ser chamado
     * se os campos não passarem pela custom request.
     * php artisan make:request EditPostRequest
     *
     */
    public function edit_post(Request $request)
    {
        $uid = Shortids::decode($request->input('uid'));
        $user = User::find($uid)->first();

        if (!$uid || !$user)
            abort(404);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->born_at = $request->input('born_at');

        // Só altera imagem se ela foi informada
        $image = $request->input('image');
        if ($image) {
            // Na verdade, aqui esse código é temporário,
            // depois deve-se tratar o arquivo enviado no post e fazer o upload dele
            // com o laravel e colocar a url final no campo, pra que assim eu só escape
            // ela com o blade no atributo src da image.
            $user->image = $image;
        }

        // Só altera senha se foi informada uma nova.
        $new_pass = $request->input('password_confirmation');
        if ($new_pass) {
            $user->password = $new_pass;
        }

        $user->save();

        return view('admin.home', array(
            'title' => 'Administração',
            'section' => 'Inicial'));
    }
}
