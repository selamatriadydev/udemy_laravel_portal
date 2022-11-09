@extends('author.layout.app')

@section('title', 'Dashbord')

@section('heading', 'Dashbord')

@section('main_content')
<div class="container-fluid">
   
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total News</span>
                    <span class="info-box-number">{{ $total_news }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total News Publish</span>
                    <span class="info-box-number">{{ $total_news_publish }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total News Draft</span>
                    <span class="info-box-number">{{ $total_news_draft }}</span>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection

