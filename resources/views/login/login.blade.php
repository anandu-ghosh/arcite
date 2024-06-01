<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00efd8">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <title>Arcite | Log in</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/dist/img/aricon.svg') }}"> 
  <link rel="apple-touch-icon" href="{{ asset('dashboard/dist/img/aricon.svg') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
  
  <style>
    .card-primary.card-outline {
        border-top: 3px solid #00f2db !important;
    }
    .btn-primary {
        background-color: #00efd8 !important;
        border-color: #00efd8 !important;
    }
    a {
        color: #4d4d4d !important;
    }
    
    img {
        width: 84%;
    }
  
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><img src="{{ asset('dashboard/dist/img/logo.svg') }}" alt="arcite-logo"/></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @include('layout.flash')
      <form action="{{route('login.store')}}" method="post" id="loginForm">
        @csrf
        <div class="input-group mb-3">
        <input type="email" value="admin@gmail.com" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="col-12 log-fail">
              @if ($errors->any())
              {{  $errors->first('email') }}
              @endif
              <label id="email-error" class="error" for="email"></label>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" value="password"  name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="col-12 log-fail">
              <label id="password-error" class="error" for="password"></label>
              @if ($errors->any())
              {{  $errors->first('password') }}
              @endif
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
    
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
