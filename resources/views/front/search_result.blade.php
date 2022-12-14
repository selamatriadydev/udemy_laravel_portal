@extends('front.layout.app')

@section('title', 'Search Result')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ SEARCH_RESULT }}</li>
        </ol> 
    </nav>
</div>
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    {{-- category all  --}}
                        <div class="row"> 
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{ ALL_POSTS_OF }} {{ SEARCH_RESULT }}</h4>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                            @if ( count($news_search_data) )
                                @foreach ($news_search_data as $post)
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
                                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news_detail', $post->id) }}">{{ $post->post_title }}</a>
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

                                <div class="col-lg-12 mb-3">
                                    {!! $news_search_data->links('vendor.pagination.bootstrap-4') !!}
                                </div>
                                    
                            @else
                                <div class="col-lg-12 mb-3">
                                    <h2 class="text-danger">{{ NO_DATA }}</h2>
                                </div>
                            @endif
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
@endsection
    
