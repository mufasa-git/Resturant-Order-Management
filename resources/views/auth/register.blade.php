<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>Akome | DOMINICAN</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset ('css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}" type="text/css" />
    <!--[if lt IE 9]>
    <script src="{{ asset ('js/ie/html5shiv.js') }}"></script>
    <script src="{{ asset ('js/ie/respond.min.js') }}"></script>
    <script src="{{ asset ('js/ie/excanvas.js') }}"></script>
    <![endif]-->
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
        <a class="text-center block" href="#" style="color: #fb6b5b; font-weight: 200; font-size: 40px; margin-top: 20px;line-height: 1.0;" data-toggle="fullscreen">Akome <br><span style="font-size: 25px; color: rgb(101, 189, 119); font-weight: 900">DOMINICAN</span></a>
        <section class="panel panel-default bg-white m-t-lg">
            <header class="panel-heading text-center">
                <strong>Register</strong>
            </header>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                            <label for="user_type" class="col-md-4 control-label">User Type</label>

                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control" user_type="user_type" value="{{ old('user_type') }}" required autofocus>

                                @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>           
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder">
        <p>
            <small>Copyright © {{date('Y')}} INFTECH Solutions</small>
        </p>
    </div>
</footer>
<!-- / footer -->

<script src="{{ asset ('js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('js/bootstrap.js') }}"></script>
<!-- App -->
<script src="{{ asset ('js/app.js') }}"></script>
<script src="{{ asset ('js/app.plugin.js') }}"></script>
<script src="{{ asset ('js/slimscroll/jquery.slimscroll.min.js') }}"></script>

</body>
</html>
