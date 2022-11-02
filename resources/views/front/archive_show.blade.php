@extends('front.layout.app')

@section('title', 'Archive')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        @php
            $created_date = "";
            if($archive_data && $archive_data->created_at){
                $ts = strtotime($archive_data->created_at);
                $created_date = date('F, Y', $ts);
            }
        @endphp
        <li class="breadcrumb-item">Archive</li>
        <li class="breadcrumb-item active" aria-current="page"> {{ $created_date ? $created_date : 'Show' }}</li>
        </ol>
    </nav>
</div>

@if ($archive_news_data)
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {{-- category all  --}}
                    <div class="row"> 
                        <div class="col-12">
                            <div class="section-title">
                                @php
                                $created_date = "";
                                if($archive_data && $archive_data->created_at){
                                    $ts = strtotime($archive_data->created_at);
                                    $created_date = date('F, Y', $ts);
                                }
                                @endphp
                                <h4 class="m-0 text-uppercase font-weight-bold">All posts of  {{ $created_date }} </h4>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div> --}}
                        @foreach ($archive_news_data as $item)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset('upload/post/'.$item->post_photo)}}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $item->rSubCategory ? $item->rSubCategory->sub_category_name : '' }}</a>
                                                @php
                                                $updated_date = "";
                                                if($item->updated_at){
                                                    $ts = strtotime($item->updated_at);
                                                    $updated_date = date('d F, Y', $ts);
                                                }
                                                @endphp
                                            <a class="text-body" href=""><small>{{ $updated_date }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                                        <div class="post-short-text m-0">
                                            {!! $item->post_detail !!}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $news_author = "";
                                                if($item->rAuthor){
                                                    $news_author = $item->rAuthor;
                                                }elseif($item->rAdmin){
                                                    $news_author = $item->rAdmin;
                                                }
                                            @endphp
                                            @if ($news_author->photo)
                                                <img class="rounded-circle mr-2" src="{{ asset('upload/profile/'.$news_author->photo) }}" width="25" height="25" alt="">
                                            @endif
                                            @if ($news_author)
                                                <small>{{ $news_author->name }}</small>
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $item->visitor }}</small>
                                            @if ($item->is_comment)
                                                <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12 mb-3">
                            {!! $archive_news_data->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                        {{-- <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div> --}}
                    </div>
                {{-- category all  --}}
            </div>
            @include('front.layout.sidebar')
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@else
<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4">
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">Not Found</h1>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@endif
@endsection
    
