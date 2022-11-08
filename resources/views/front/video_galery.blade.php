@extends('front.layout.app')

@section('title', 'Galery')

@section('main_content') 
@push('script')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ GALLERY }}</li>
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
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{ VIDEO_GALLERY }}</h4>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                            @foreach ($video_galery as $item)
                                <div class="col-lg-6">
                                    <div class="position-relative overflow-hidden" style="height: 300px;">
                                        {{-- <img class="img-fluid h-100 img-thumbnail" src="{{ asset('upload/galery/photo/'.$item->photo)}}" style="object-fit: cover;"> --}}
                                        <img src="//img.youtube.com/vi/{{ $item->video_id }}/0.jpg" alt="https://www.youtube.com/vi/{{ $item->video_id }}" class="img-responsive">
                                        <div class="overlay" for="click{{ $item->id }}">
                                            <div class="mb-2">
                                                @php
                                                    $news_author = "";
                                                    if($item->rAuthor){
                                                        $news_author = $item->rAuthor;
                                                    }elseif($item->rAdmin){
                                                        $news_author = $item->rAdmin;
                                                    }
                                                @endphp
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">{{ $news_author->name }}</a>
                                                    @php
                                                    $updated_date = "";
                                                    if($item->updated_at){
                                                        $ts = strtotime($item->updated_at);
                                                        $updated_date = date('d F, Y', $ts);
                                                    }
                                                    @endphp
                                                <a class="text-white" href=""><small>{{ $updated_date }}</small></a>
                                            </div>
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" data-toggle="modal" data-target="#galeryVideo{{ $item->id }}"href="">{{ SHOW }}</a>
                                            {{-- <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="" >{{ $item->caption }}</a> --}}
                                        </div>
                                    </div>

                                    <div class="modal fade bd-example-modal-lg" id="galeryVideo{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="galeryVideo{{ $item->id }}Label" aria-hidden="true">
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
                                                                    $news_author = "";
                                                                    if($item->rAuthor){
                                                                        $news_author = $item->rAuthor;
                                                                    }elseif($item->rAdmin){
                                                                        $news_author = $item->rAdmin;
                                                                    }
                                                                    $updated_date = "";
                                                                    if($item->updated_at){
                                                                        $ts = strtotime($item->updated_at);
                                                                        $updated_date = date('d F, Y', $ts);
                                                                    }
                                                                @endphp
                                                                {{ $news_author->name }} <cite title="Source Title">{{ $updated_date }}</cite>
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
                                </div>
                            @endforeach
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                            <div class="col-lg-12 mb-3">
                                {!! $video_galery->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                    {{-- category all  --}}
                </div>
                
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
    
