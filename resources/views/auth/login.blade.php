<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arquivos - Login</title>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset("bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="{{ asset('css/form-user.css') }}" rel="stylesheet">
    <style type="text/css">
        .logo {
            width: 70%;
            text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        a {
            margin-top: 2px;
            margin-bottom: 2px;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-user" action="{{ route('post_login') }}" method="POST">
        {!! csrf_field() !!}
        <div class="logo">
            <img class="logo" src="{{ asset('logo.png') }}" alt="AutomaServ"/>
        </div>
        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="form-user-heading"></h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus=""  value="{{ old('email') }}">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

</div> <!-- /container -->


</body></html>