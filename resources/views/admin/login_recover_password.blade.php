@extends('admin.layout.app')

@section('title', 'Recover Password')

@section('main_content')
<div class="login-box">
  <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>Panel</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
        @if (session()->get('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @if (session()->get('success'))
          <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->get('error_recover'))
          <div class="alert alert-danger">{{ session()->get('error_recover') }}</div>
        @endif

        @if (!session()->get('error_recover'))
          <form action="{{ route('admin_recover_password_submit') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Change password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mt-3 mb-1">
            <a href="{{ route('admin_login') }}" >Login</a>
          </p>
          @else
          <p class="mt-3 mb-1">
            <a href="{{ route('admin_login') }}" class="btn btn-primary btn-block">Login</a>
          </p>
        @endif
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection