@extends('admin.index')

@section('content')
    <!-- Hidden Add Form -->
    <a name="form_anchor"></a>
    <div id="form_div" class="row">
        <form id="form_access" action="{{ route('users_edit_post') }}" method="post">
            <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="idU" type="hidden" name="uid" value="{{ Auth::user()->getId() }}">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><a name="form"><i class="fa fa-lock"></i></a> &nbsp; Altere suas informações pessoais</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <!-- /.box-header -->
                        <div class="box-body">

                            @if ($errors->has('image'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label id="labelImage" for="inputImage">Alterar imagem de perfil:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                    <input name="image" type="file" class="form-control input-lg" placeholder="Escolha a imagem de perfil"/>
                                </div>
                                @if ($errors->has('image'))
                                <label id="labelImage" for="inputImage"><i class="fa fa-times-circle-o"></i> {{ $errors->first('image') }}</label>
                                @endif
                            </div>

                            @if ($errors->has('email'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label id="labelEmail" for="inputEmail">E-mail:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    @if (old('email'))
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control input-lg" placeholder="endereço de email"/>
                                    @else
                                    <input name="email" value="{{ Auth::user()->email }}" type="email" class="form-control input-lg" placeholder="endereço de email"/>
                                    @endif
                                </div>
                                @if ($errors->has('email'))
                                <label id="labelEmail" for="inputEmail"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
                                @endif
                            </div>

                            @if ($errors->has('name'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label id="labelname" for="inputname">Nome de Usuário:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    @if (old('name'))
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control input-lg" placeholder="nome de usuário"/>
                                    @else
                                    <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control input-lg" placeholder="nome de usuário"/>
                                    @endif
                                </div>
                                @if ($errors->has('name'))
                                    <label id="labelname" for="inputname"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                                @endif
                            </div>

                            @if ($errors->has('password'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label id="labelSenha" for="inputPassword">Senha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="password" type="password" class="form-control input-lg" placeholder="senha de acesso"/>
                                </div>
                                @if ($errors->has('password'))
                                    <label id="labelname" for="inputname"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
                                @endif
                            </div>

                            @if ($errors->has('password_confirmation'))
                            <div class="form-group has-error">
                            @else
                            <div class="form-group">
                            @endif
                                <label id="labelSenhaConfirma" for="inputPassword">Confirme a senha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="password_confirmation" id="inputPasswordConfirmation" type="password" class="form-control input-lg" placeholder="digite a senha novamente"/>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <label id="labelname" for="inputname"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}</label>
                                @endif
                            </div>

                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button id="form_send" class="btn btn-primary">Salvar</button>
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
        $(function(){
            // pass
        });
    </script>
@stop