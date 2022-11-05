@extends('front.layout.app')

@section('title', 'Reset Password')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->

<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Reset Password</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <form action="{{ route('author_reset_password_submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" class="form-control p-4 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Password Confirm *</label>
                            <input type="password" class="form-control p-4 @error('password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Reset password</button>
                            <a href="{{ route('login') }}">login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
    
