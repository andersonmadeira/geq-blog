@extends('index')

@section('content')
  <!-- /.box -->
  <div class="row">
    <div class="col-md-12">
        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block">
              <img class="img-circle" src="{{ $post->getAuthor()->image }}" alt="User Image">
              <span class="post_title_avtr"><a href="#">{{ $post->title }}</a></span>
              <span class="description">Escrito por <b>{{ $post->getAuthor()->name }}</b>, em {{ $post->getPrettyPostDate() }}</span>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- post text -->
            <div class="row">
              <div class="col-md-12">
                <img class="img-responsive" src="{{ $post->image }}" alt="Imagem destaque"/>
              </div>
              <div class="col-md-12 post-body">
                {!! $post->content !!}
              </div>
            </div>
          </div>
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->
        </div>
    </div>
  </div>
@stop