@extends('front.layout.app')

@section('title', 'Reset Password')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ RESET_PASSWORD }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->

<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ RESET_PASSWORD }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <form action="{{ route('author_reset_password_submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="password">{{ PASSWORD }} *</label>
                            <input type="password" class="form-control p-4 @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ PASSWORD }}">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">{{ PASSWORD_CONFIRM }} *</label>
                            <input type="password" class="form-control p-4 @error('password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="{{ PASSWORD_CONFIRM }}">
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">{{ RESET_PASSWORD }}</button>
                            <a href="{{ route('login') }}">{{ LOGIN }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
    
