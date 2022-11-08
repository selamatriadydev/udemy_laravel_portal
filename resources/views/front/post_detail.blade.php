@extends('front.layout.app')

@section('title', 'Detail')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        @if ($news_detail)
            <li class="breadcrumb-item"><a href="{{ route('news_category_detail', $news_detail->rSubCategory->id) }}">{{ $news_detail->rSubCategory ? $news_detail->rSubCategory->sub_category_name : 'Category' }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $news_detail->post_title }}</li>
        @endif
        </ol>
    </nav>
</div>
<!-- Breaking News Start -->
@if ($global_news_tranding)
<div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">{{ TRANDING }}</h4>
                    </div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                        style="width: calc(100% - 180px); padding-right: 100px;">
                        @foreach ($global_news_tranding as $item)
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Breaking News End -->


@if ($news_detail) 
<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    @if ($news_detail->post_photo)
                        <img class="img-fluid w-100" src="{{ asset('upload/post/'.$news_detail->post_photo)}}" style="object-fit: cover;">
                    @endif
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $news_detail->rSubCategory ? $news_detail->rSubCategory->sub_category_name : '' }}</a>
                            {{-- <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">Business</a> --}}
                            {{-- <a class="text-body" href="">Jan 01, 2045</a> --}}
                            @php
                            $updated_date = "";
                            if($news_detail->updated_at){
                                $ts = strtotime($news_detail->updated_at);
                                $updated_date = date('d F, Y', $ts);
                            }
                            @endphp
                            {{-- <a class="text-body" href="">{{  \Carbon\Carbon::parse($news_detail->updated_at)->format('d F, Y') }}</a> --}}
                            <a class="text-body" href="">{{  $updated_date }}</a>
                        </div>
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $news_detail->post_title }}</h1>
                        <div class="m-0">
                            {!! $news_detail->post_detail !!}
                        </div>

                        @if ($news_tag)
                            <div class="bg-white p-3">
                                <h5 class="text-uppercase font-weight-bold">{{ TAGS }}</h5>
                                <div class="d-flex flex-wrap m-n1">
                                    @foreach ($news_tag as $item)
                                        <a href="" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 m-1">{{ $item->tag_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            @if ($news_detail->is_share)
                                <a href="" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 m-1">{{ SHARE }}</a>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            @if ($news_author)
                                @if ($news_author->photo)
                                    <img class="rounded-circle mr-2" src="{{ asset('upload/profile/'.$news_author->photo) }}" width="25" height="25" alt="Photo {{ $news_author->name }}">
                                @endif
                                <span>{{ $news_author->name }}</span>
                            @endif
                            <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news_detail->visitor }}</span>
                            @if ($news_detail->is_comment)
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                               
                            @endif
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->
                @if ($news_detail->is_comment)
                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            @if ($global_setting_data && $global_setting_data->disqus_status == 'Show')
                            {!! $global_setting_data->disqus_code !!}
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                </div>
                            </div>
                            <div class="media">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    <div class="media mt-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;">
                                        <div class="media-body">
                                            <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                                eirmod ipsum.</p>
                                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
                @endif
                
                @if ($news_related)
                    <!-- Related News Slider Start -->
                    <div class="mb-3">
                        <div class="section-title  mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ RELATED_NEWS }}</h4>
                        </div>
                        <div class="owl-carousel news-carousel carousel-item-3 position-relative">
                            @foreach ($news_related as $item)
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                                    <img class="img-fluid h-100" src="{{ asset('upload/post/'.$item->post_photo)}}" style="object-fit: cover;">
                                    <div class="overlay">
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
                                            <a class="text-white" href=""><small>{{ $updated_date }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Related News Slider End -->
                @endif
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
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4">
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">Not Found</h1>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

            @include('front.layout.sidebar')
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
    
@endif
@endsection
    
