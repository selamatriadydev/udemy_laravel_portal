@extends('admin.layout.app')

@section('title', 'Login')

@section('main_content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>Panel</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if (session()->get('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @if (session()->get('success'))
          <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('admin_login_submit') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
              <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
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
        <!-- /.social-auth-links -->
  
        <p class="mb-1">
          <a href="{{ route('admin_forget_password') }}">I forgot my password</a>
        </p>
        {{-- <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection