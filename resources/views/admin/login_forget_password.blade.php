@extends('admin.layout.app')

@section('title', 'Forget Password')

@section('main_content')
<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>Panel</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        @if (session()->get('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @if (session()->get('success'))
          <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('admin_forget_password_submit') }}" method="post">
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
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="{{ route('admin_login') }}">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection