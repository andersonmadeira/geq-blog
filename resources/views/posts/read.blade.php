@extends('admin.index')

@section('content')
  <!-- Main DataTable -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
            <tr>
              <th>Titulo</th>
              <th>Autor</th>
              <th>Data publicação</th>
            </tr>
              @foreach($posts as $p)
                <tr>
                  <td class="center">
                    <a href="#?">
                      {{ $p->title }}
                    </a>
                  </td>
                  <td>{{ $p->getAuthor()->name }}</td>
                  <td>{{ $p->getPrettyPostDate() }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          @if (isset($posts))
            {!! $posts->render() !!}
          @endif
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  </div>
  <!-- Hidden Add Form -->
  <a name="form_anchor"></a>
  <div id="form_div" class="row" style="display: none;">
    <form id="form_add">
      <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
      <input id="item_id" type="hidden" name="item_id" value="0">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><a name="form"><i class="fa fa-user-plus"></i></a> &nbsp; Preencha os campos obrigatórios:</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- /.box-header -->
            <div class="box-body">

              <div class="form-group">
                <label id="labelSenha" for="inputPassword">Senha:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input name="password" type="password" class="form-control input-lg" placeholder="senha de acesso"/>
                </div>
              </div>

              <div class="form-group">
                <label id="labelSenhaConfirma" for="inputPassword">Confirme a senha:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input name="password_confirmation" id="inputPasswordConfirmation" type="password" class="form-control input-lg" placeholder="digite a senha novamente"/>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button id="form_send" class="btn btn-primary">Salvar</button>
              <button id="form_cancel" class="btn btn-default">Cancelar</button>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </form>
  </div><!-- /.row -->

@stop


@section('scripts')
  @parent

  <script>
    $(document).ready(function(){
      $('ul.pagination').addClass('pagination-sm no-margin pull-right');
    });
  </script>
@stop