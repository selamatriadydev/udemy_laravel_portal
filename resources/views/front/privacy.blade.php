@extends('front.layout.app')

@section('title', $page_privacy ? $page_privacy->privacy_title : 'Privacy')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_privacy ? $page_privacy->privacy_title : 'Privacy' }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $page_privacy ? $page_privacy->privacy_title : 'Privacy' }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-4">
                            @if ($page_privacy)
                                {!! $page_privacy->privacy_detail !!}
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
    
