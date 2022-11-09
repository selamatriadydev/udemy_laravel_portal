@extends('admin.layout.app')

@section('title', 'Dashbord')

@section('heading', 'Dashbord')

@section('main_content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fab fa-atlassian"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total News Categories</span>
                    <span class="info-box-number">{{ $total_category }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fab fa-bandcamp"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total SubCategory</span>
                    <span class="info-box-number">{{ $total_subcategory }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total News</span>
                    <span class="info-box-number">{{ $total_news }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-camera"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Photos</span>
                    <span class="info-box-number">{{ $total_photo }}</span>
                </div>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-video"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Videos</span>
                    <span class="info-box-number">{{ $total_video }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-question-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total FAQ</span>
                    <span class="info-box-number">{{ $total_faq }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Authors</span>
                    <span class="info-box-number">{{ $total_author }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Subscribers</span>
                    <span class="info-box-number">{{ $total_subscriber }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-vote-yea"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Polls</span>
                    <span class="info-box-number">{{ $total_poll }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-book-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Live Channels</span>
                    <span class="info-box-number">{{ $total_channel }}</span>
                </div>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <!-- /.row -->
</div>
@endsection

