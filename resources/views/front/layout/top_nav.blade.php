
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-8">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        {{-- <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small text-white" href="#">Monday, January 1, 2045</a>
                        </li> --}}
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link small text-white" href="#">Monday, January 1, 2045</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        {{-- <li class="nav-item border-right border-secondary">
                            <a class="nav-link small text-white" href="#">FAQ</a>
                        </li> --}}
                        @if ($global_page_data)
                            @if ($global_page_data->faq_status == 'Show')
                                <li class="nav-item">
                                    <a class="nav-link small text-white" href="{{ route('faq') }}">{{ $global_page_data->faq_title }}</a>
                                </li>
                            @endif
                            @if ($global_page_data->about_status == 'Show')
                                <li class="nav-item">
                                    <a class="nav-link small text-white" href="{{ route('about') }}">{{ $global_page_data->about_title }}</a>
                                </li>
                            @endif
                            @if ($global_page_data->contact_status == 'Show')
                                <li class="nav-item">
                                    <a class="nav-link small text-white" href="{{ route('contact') }}">{{ $global_page_data->contact_title }}</a>
                                </li>
                            @endif
                            @if ($global_page_data->login_status == 'Show')
                                @if (Auth::guard('author')->user())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link small text-white dropdown-toggle" href="#" id="navbarDropdownLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::guard('author')->user()->name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownLogin">
                                        <a class="dropdown-item" href="#">Author Panel</a>
                                        <a class="dropdown-item" href="{{ route('author_logout') }}">Logout</a>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link small text-white" href="{{ route('login') }}">{{ $global_page_data->login_title }}</a>
                                    </li>
                                @endif
                            @endif
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link small text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Language
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">English</a>
                              <a class="dropdown-item" href="#">Indonesia</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Indonesia</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal">News</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                {{-- setting global_header_ad_data di app/provider/AppServiceProvider.php di bagian boot  --}}
                @if ($global_header_ad_data && $global_header_ad_data->above_ad)
                    @if ($global_header_ad_data->above_ad_url)
                        <a href="{{ $global_header_ad_data->above_ad_url }}"><img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_header_ad_data->above_ad) }}" alt=""></a>
                    @else
                        <img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_header_ad_data->above_ad) }}" alt="">
                    @endif
                @endif
            </div>
        </div>
    </div>