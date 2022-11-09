@extends('front.layout.app')

@section('title', 'Home')


@push('script')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush

@section('main_content')
<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @php $i=0; @endphp
                @foreach ($news_data as $item)
                    @php $i++; @endphp
                    {{-- @if ($i < $news_setting->news_tranding_total) @continue @endif --}}
                    @if ($i>3) @break @endif
                    <div class="position-relative overflow-hidden" style="height: 500px;">
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
                                <a class="text-white" href="">{{ $updated_date }}</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                @php $i=0; @endphp
                @foreach ($news_data as $item)
                    @php $i++; @endphp
                    {{-- @if ($i==0) @continue @endif --}}
                    {{-- @if ($i < 4) @continue @endif --}}
                    @if ($i>4) @break @endif
                    <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="{{ asset('upload/post/'.$item->post_photo)}}" style="object-fit: cover;">
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
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Breaking News Start -->
@if ($news_setting)
<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    {{-- <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div> --}}
                    <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">{{ BREAKING_NEWS }}</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                        style="width: calc(100% - 170px); padding-right: 90px;">
                        @php $i=0; @endphp
                        @foreach ($news_data as $item)
                            @php $i++; @endphp
                            @if ($i>$news_setting->news_tranding_total)
                                @break
                            @endif
                            <div class="text-truncate">
                                <a class="text-white text-uppercase font-weight-semi-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">
                                    {{ $item->post_title }}
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Breaking News End -->


<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ FEATURED_NEWS }}</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @foreach ($featured_news_data as $item)
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
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured News Slider End -->


<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="bg-white border border-top-0 p-4">
            <form id="search" action="{{ route('search_result') }}" method="POST">
                @csrf
                <div class="form-row">
                  <div class="col-5">
                    <input type="text" class="form-control" name="search_item" placeholder="{{ TITLE_DESCRIPTION }}">
                  </div>
                  <div class="col">
                    <select name="search_category" id="search_category" class="form-control search_category">
                        <option value="">{{ SELECT_CATEGORY }}</option>
                        @foreach ($search_category_data as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col">
                    <select name="search_sub_category" id="sub_category" class="form-control search_subCategory">
                        <option value="">{{ SELECT_SUBCATEGORY }}</option>
                        @foreach ($search_category_data as $item)
                            <optgroup id="{{ $item->id }}" label="{{ $item->category_name }}">
                                @foreach ($item->rSubCategory as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->sub_category_name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">{{ SEARCH }}</button>
                  </div>
                </div>
            </form>
            @push('script')
                <script>
                    (function($){
                        $(document).ready( function(){
                            var $subCategory = $(".search_subCategory > optgroup").clone();
                            $('#search_category').on("change", function() {
                                var selectedCategory = $(this).val();
                                // console.log(selectedCategory);
                                if(selectedCategory){ 
                                    $(this).closest('#search').find(".search_subCategory").html($subCategory.clone().filter('[id="' + selectedCategory + '"]'));
                                }else{
                                    $(this).closest('#search').find(".search_subCategory").html($subCategory);
                                }
                            });
                        });
                    })(jQuery);
                </script>
            @endpush
        </div>
    </div>
</div>
<!-- Featured News Slider End -->

<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ LATEST_NEWS }}</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('news_category') }}">{{ VIEW_ALL }}</a>
                        </div>
                    </div>
                    @if ($home_ad_top && $home_ad_top->above_ad)
                        <div class="col-lg-12 mb-3">
                            @if ($home_ad_top->above_ad_url)
                                <a href="{{ $home_ad_top->above_ad_url }}"><img class="img-fluid w-100" src="{{ asset('upload/advertisement/'.$home_ad_top->above_ad) }}" alt="top"></a>
                            @else
                                <img class="img-fluid w-100" src="{{ asset('upload/advertisement/'.$home_ad_top->above_ad) }}" alt="top">
                            @endif
                        </div>
                    @endif
                    @php $i=0;  @endphp
                        @foreach ($news_data_all as $item)
                            @php $i++; @endphp
                            @if ( $i>$news_setting->news_tranding_total) 
                                @break
                            @endif
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
                                        <a class="h6 d-block mb-3 text-secondary text-uppercase font-weight-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
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
                                            @if ( $news_author && $news_author->photo)
                                                <img class="rounded-circle mr-2" src="{{ asset('upload/profile/'.$news_author->photo) }}" width="25" height="25" alt="">
                                            @endif
                                            @if ($news_author && $news_author)
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
                        {!! $news_data_all->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                    @if ($home_ad_bottom && $home_ad_bottom->above_ad)
                        <div class="col-lg-12 mb-3">
                            @if ($home_ad_bottom->above_ad_url)
                                <a href="{{ $home_ad_bottom->above_ad_url }}"><img class="img-fluid w-100" src="{{ asset('upload/advertisement/'.$home_ad_bottom->above_ad) }}" alt="bottom"></a>
                            @else
                                <img class="img-fluid w-100" src="{{ asset('upload/advertisement/'.$home_ad_bottom->above_ad) }}" alt="bottom">
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            
            @include('front.layout.sidebar')
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<!-- Video Slider Start -->
@if ($setting_video && $setting_video->video_status == 'Show')
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">{{ VIDEO }}</h4>
            </div>
            @if ($video_data)
                @foreach ($video_data as $item)
                    @if ($loop->iteration > $setting_video->video_total)
                        @break
                    @endif
                    <div class="modal fade bd-example-modal-lg" id="videoData{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="videoData{{ $loop->iteration }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->video_id }}?rel=0" allowfullscreen></iframe>
                                            </div>
                                            {{-- <img class="img-fluid h-100 img-thumbnail" src="{{ asset('upload/galery/photo/'.$item->photo)}}" style="object-fit: cover;"> --}}
                                            <blockquote class="blockquote mb-0">
                                                <p>{{ $item->caption }}</p>
                                                <footer class="blockquote-footer">
                                                    @php
                                                        $md_video_author = "";
                                                        if($item->rAuthor){
                                                            $md_video_author = $item->rAuthor;
                                                        }elseif($item->rAdmin){
                                                            $md_video_author = $item->rAdmin;
                                                        }
                                                        $updated_date = "";
                                                        if($item->updated_at){
                                                            $ts = strtotime($item->updated_at);
                                                            $updated_date = date('d F, Y', $ts);
                                                        }
                                                    @endphp
                                                    {{ $md_video_author->name }} <cite title="Source Title">{{ $updated_date }}</cite>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ CLOSE }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="owl-carousel news-carousel carousel-item-{{ count($video_data) > 4 ? '4' : '2' }} position-relative">
                    @foreach ($video_data as $item)
                        @if ($loop->iteration > $setting_video->video_total)
                            @break
                        @endif
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid h-100" src="//img.youtube.com/vi/{{ $item->video_id }}/0.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    @php
                                        $video_author = "";
                                        if($item->rAuthor){
                                            $video_author = $item->rAuthor;
                                        }elseif($item->rAdmin){
                                            $video_author = $item->rAdmin;
                                        }
                                    @endphp
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $video_author ? $video_author->name : '' }}</a>
                                        @php
                                        $updated_date = "";
                                        if($item->updated_at){
                                            $ts = strtotime($item->updated_at);
                                            $updated_date = date('d F, Y', $ts);
                                        }
                                        @endphp
                                    <br><a class="text-white" href=""><small>{{ $updated_date }}</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" data-toggle="modal" data-target="#videoData{{ $loop->iteration }}" href="">{{ SHOW }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
<!-- Video Slider End -->

@endsection

    
