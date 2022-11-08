@extends('front.layout.app')

@section('title', $page_faq ? $page_faq->faq_title : 'FAQ')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_faq ? $page_faq->faq_title : 'FAQ' }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $page_faq ? $page_faq->faq_title : 'FAQ' }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    {{-- <div class="mb-4">
                        <div class="mb-4">
                            @if ($page_faq)
                                {!! $page_faq->faq_detail !!}
                            @endif
                        </div>
                    </div> --}}
                    <div class="mb-4">
                        <div class="mb-4">
                            @if ($faq_data)
                                <div class="list-group">
                                    @foreach ($faq_data as $item)
                                    <a href="#" class="list-group-item list-group-item-action {{ $loop->iteration == 1 ? 'active' : '' }}" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="{{ $loop->iteration==1 ? 'true' : 'false' }}" aria-controls="collapse-{{ $loop->iteration }}">
                                        Q: {{ $item->faq_title }}?
                                    </a>
                                    <div id="collapse-{{ $loop->iteration }}" class="collapse {{ $loop->iteration == 1 ? 'show' : '' }}">
                                        <div class="card card-body">
                                            {!! $item->faq_detail !!}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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
    
