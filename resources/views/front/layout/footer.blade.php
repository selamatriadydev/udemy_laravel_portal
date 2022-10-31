<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <ul class="navbar-nav ml-auto mr-n2">
                <li class="nav-item">
                    <a class="nav-link small text-white" href="{{ route('home') }}">Home</a>
                </li>
                @if ($global_page_data)
                    @if ($global_page_data->terms_status == 'Show')
                        <li class="nav-item">
                            <a class="nav-link small text-white" href="{{ route('terms') }}">{{ $global_page_data->terms_title }}</a>
                        </li>
                    @endif
                    @if ($global_page_data->privacy_status == 'Show')
                        <li class="nav-item">
                            <a class="nav-link small text-white" href="{{ route('privacy') }}">{{ $global_page_data->privacy_title }}</a>
                        </li>
                    @endif
                    @if ($global_page_data->disclaimer_status == 'Show')
                        <li class="nav-item">
                            <a class="nav-link small text-white" href="{{ route('disclaimer') }}">{{ $global_page_data->disclaimer_title }}</a>
                        </li>
                    @endif
                    @if ($global_page_data->contact_status == 'Show')
                        <li class="nav-item">
                            <a class="nav-link small text-white" href="{{ route('contact') }}">{{ $global_page_data->contact_title }}</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                @foreach ($global_news_sub_category as $item)
                    <a href="{{ route('news_category_detail', $item->id) }}" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 mb-2">{{ $item->sub_category_name }} <span class="right badge badge-danger">{{ $item->r_front_post_count }}</span> </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
            <div class="row">
                @foreach ($global_news_tranding as $item)
                    <div class="col-4 mb-3">
                        <a href="{{ route('news_detail', $item->id) }}"><img class="w-100" src="{{ asset('upload/post/'.$item->post_photo)}}" alt=""></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
    
    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
    Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
</div>