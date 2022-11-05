@extends('front.layout.app')

@section('title', 'Forget Password')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->

<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Forget Password</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <form action="{{ route('author_forget_password_submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="text" class="form-control p-4 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Forget password</button>
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
    
