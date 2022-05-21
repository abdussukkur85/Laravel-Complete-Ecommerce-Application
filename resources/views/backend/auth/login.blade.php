

@extends('backend.layouts.admin_app')
@section('body')
    login-page
@endsection

@section('app_content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('admin.login') }}" class="h1"><b>Admin </b>Sing In</a>
      </div>
      <div class="card-body">
        @if (session('error'))
          <p class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="text-white">{{ session('error') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </p>
        @endif

        @if(session()->has('message'))
          <p class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="text-white">{{ session()->get('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </p>
        @endif
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form action="{{ route('admin.login') }}" method="post">
          @csrf
          <div class="input-group @error('email') border rounded-lg border-danger @enderror">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="mb-3"></div>
          

          <div class="input-group @error('email') border rounded-lg border-danger @enderror">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="mb-3"></div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember_me">
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
  
        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->
  
        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection