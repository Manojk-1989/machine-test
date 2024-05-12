<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <link href="{{ asset('css/icheck-bootstrap.min.css') }}" rel="stylesheet">

  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->
  <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('admin.create') }}"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{route('admin.login')}}">
                                    {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          
        </div>
        @if($errors->has('email'))
    <div class="error text-danger">{{ $errors->first('email') }}</div>
@endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if($errors->has('password'))
    <div class="error text-danger">{{ $errors->first('password') }}</div>
@endif

@if(session()->has('error'))
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="custom-form-group">  
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                    </div>

									</div>
                                @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
     
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/adminlte.min.js') }}"></script>


</body>
</html>
