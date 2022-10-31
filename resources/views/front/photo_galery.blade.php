@extends('front.layout.app')

@section('title', 'Galery')

@section('main_content') 
<div><script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Galery</li>
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
                                    <h4 class="m-0 text-uppercase font-weight-bold">Galery Photo</h4>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-3">
                                <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                            </div> --}}
                            @foreach ($photo_galery as $item)
                                <div class="col-lg-6">
                                    <div class="position-relative overflow-hidden" style="height: 300px;">
                                        <img class="img-fluid h-100 img-thumbnail" src="{{ asset('upload/galery/photo/'.$item->photo)}}" style="object-fit: cover;">
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
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" data-toggle="modal" data-target="#galeryPhoto{{ $item->id }}"href="">Show</a>
                                            {{-- <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="" >{{ $item->caption }}</a> --}}
                                        </div>
                                    </div>

                                    <div class="modal fade bd-example-modal-lg" id="galeryPhoto{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="galeryPhoto{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="galeryPhoto{{ $item->id }}Label">Galery</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img class="img-fluid h-100 img-thumbnail" src="{{ asset('upload/galery/photo/'.$item->photo)}}" style="object-fit: cover;">
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                {!! $photo_galery->links('vendor.pagination.bootstrap-4') !!}
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
    
