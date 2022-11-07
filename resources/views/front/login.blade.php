@extends('front.layout.app')

@section('title', $page_login ? $page_login->login_title : 'Login')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_login ? $page_login->login_title : 'Login' }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->

<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $page_login ? $page_login->login_title : 'Login' }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <form action="{{ route('author_login_submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="text" class="form-control p-4 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="email">Password *</label>
                            <input type="password" class="form-control p-4 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Login</button>
                            <a href="{{ route('author_forget_password') }}" class="forget_password">Forget Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
    
