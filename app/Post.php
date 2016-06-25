<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Shortids;

class Post extends Model
{
    protected $table = 'posts';

    // método não é mais necessário. Pode se chamar só o getAuthor() e pegar o attr name
    public function getAuthorName()
    {
        return User::find($this->user_id)->first()->name;
    }

    public function getAuthor()
    {
        return User::find($this->user_id)->first();
    }

    public function getPrettyPostDate()
    {
        return ucfirst(Date::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('l j F Y H:i:s'));
    }

    // pega o resumo do post
    public function getExcerpt()
    {
        return substr($this->content, 0, 200);
    }

    public function getId()
    {
        return Shortids::encode($this->id);
    }
}
