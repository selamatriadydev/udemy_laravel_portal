@extends('front.layout.app')

@section('title', 'Category')

@section('main_content') 
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($news_category as $item)
                    {{-- category all  --}}
                        <div class="row"> 
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ $item->sub_category_name }}</h4>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('news_category_detail', $item->id) }}">View All </a>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                            @foreach ($item->rFrontPost as $post)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('upload/post/'.$post->post_photo)}}" style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">{{ $post->rSubCategory ? $post->rSubCategory->sub_category_name : '' }}</a>
                                                    @php
                                                    $updated_date = "";
                                                    if($post->updated_at){
                                                        $ts = strtotime($post->updated_at);
                                                        $updated_date = date('d F, Y', $ts);
                                                    }
                                                    @endphp
                                                <a class="text-body" href=""><small>{{ $updated_date }}</small></a>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news_detail', $item->id) }}">{{ $post->post_title }}</a>
                                            <div class="post-short-text m-0">
                                                {!! $post->post_detail !!}
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                @php
                                                    $news_author = "";
                                                    if($post->rAuthor){
                                                        $news_author = $post->rAuthor;
                                                    }elseif($post->rAdmin){
                                                        $news_author = $post->rAdmin;
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
                                                <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $post->visitor }}</small>
                                                @if ($post->is_comment)
                                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                        </div>
                    {{-- category all  --}}
                    @endforeach
                </div>
                
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
    
