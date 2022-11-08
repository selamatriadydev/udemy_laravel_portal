@extends('front.layout.app')

@section('title', $page_about ? $page_about->about_title : 'About')

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_about ? $page_about->about_title : 'About' }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $page_about ? $page_about->about_title : 'About' }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-4">
                            @if ($page_about)
                                {!! $page_about->about_detail !!}
                            @endif
                        </div>
                    </div>
                    <h6 class="text-uppercase font-weight-bold mb-3">{{ CONTACT_US }}</h6>
                    <form>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your Name" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your Email" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Subject" required="required"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Message" required="required"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                type="submit">{{ SEND_MESSAGE }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('front.layout.sidebar')
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
    
