
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $share_data['system_name'] }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('upload/others/'.$share_data['admin_logo']) }}">
    <link rel="shortcut icon" href="{{ asset('upload/others/'.$share_data['favicon']) }}">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('upload/others/'.$share_data['admin_logo']) }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>


                            @if (Route::has('password.request'))
                                <label class="pull-right">
                                    <a href="{{ route('password.request') }}">Forgotten Password?</a>
                                </label>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend') }}/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('backend') }}/assets/js/main.js"></script>


</body>
</html>
