@extends('index')

@section('content')
  <!-- /.box -->
  <div class="row">
    <div class="col-md-12">
      @foreach ($posts as $p)
        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block">
              <span class="post_title"><a href="{{ route('post', ['pid'=>$p->getId()]) }}">{{ $p->title }}</a></span>
              <span class="post_detail">Enviado: {{ $p->getPrettyPostDate() }}</span>
            </div>
            <!-- /.user-block -->
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool __web-inspector-hide-shortcut__" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- post text -->
            <div class="row">
              <div class="col-md-12">
                <img class="img-responsive" src="{{ $p->image }}" alt="Imagem destaque"/>
              </div>
              <div class="col-md-12 post-body">
                {!! $p->getExcerpt() !!} <small>(...)</small>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <a href="{{ route('post', ['pid'=>$p->id]) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Ler mais</a>
          </div>
          <!-- /.box-footer -->
        </div>
      @endforeach
    </div>
  </div>

  <div class="text-center">
    @if (isset($posts))
      {!! $posts->render() !!}
    @endif
    @if (isset($search_results))
      {!! $search_results->appends(Request::only('search'))->render() !!}
    @endif
  </div>
@stop