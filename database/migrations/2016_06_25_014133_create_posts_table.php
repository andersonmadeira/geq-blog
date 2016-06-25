<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50); // titulo
            $table->text('content'); // conteudo
            $table->string('image', 35); // imagem
            $table->integer('user_id')->unsigned(); // autor do post, snake case dessa maneira pro laravel pegar automaticamente o nome do campo
            $table->timestamps();
        });

        // Cria a chave estrangeira que referencia a id do usuário autor do post
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
