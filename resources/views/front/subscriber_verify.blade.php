@extends('front.layout.app')

@section('title', 'Subscriber Verify')

@section('main_content') 
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Subscriber Verify</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-4">
                            @if ( isset($success_verify) && $success_verify)
                                <div class="alert alert-success" role="alert">{{ $success_verify }}</div> 
                            @endif

                            @if ( isset($error_verify) && $error_verify)
                                <div class="alert alert-danger" role="alert">{{ $error_verify }}</div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('front.layout.sidebar')
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
    
