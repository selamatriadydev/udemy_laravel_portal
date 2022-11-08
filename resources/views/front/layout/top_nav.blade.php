
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-8">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        {{-- <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small text-white" href="#">Monday, January 1, 2045</a>
                        </li> --}}
                        @if ($global_setting_data)
                            @if ($global_setting_data->top_bar_date_status == 'Show')
                                <li class="nav-item border-right border-secondary">
                                    {{-- <a class="nav-link small text-white" href="#"> <i class="fa fa-calendar"></i> Today : {{ date('d F, Y')  }}</a> --}}
                                    <a class="nav-link small text-white" href="#"> <i class="fa fa-calendar"></i> {{ TODAY }} : {{ date('d F, Y')  }}</a>
                                </li>
                            @endif
                            @if ($global_setting_data->top_bar_email != '' && $global_setting_data->top_bar_email_status == 'Show')
                                <li class="nav-item border-right border-secondary">
                                    <a class="nav-link small text-white" href="#"><i class="fa fa-envelope"></i> {{ $global_setting_data->top_bar_email }}</a>
                                </li>
                            @endif
                            
                        @endif
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
                                {{ $current_lang_name ? $current_lang_name : 'Language' }}
                            </a>
                            <form action="{{ route('front_language_switch') }}" method="post" id="form_language_swith">
                                @csrf
                                <input type="hidden" name="short_name" id="short_name" value="">
                            </form>
                            @push('script')
                            <script type="text/javascript">
                                (function($){
                                    $('.list_language_swith a').click(function () {
                                        var lang_val = $(this).attr("data-value");
                                        // alert(lang_val);
                                        var $frm = $('#form_language_swith');
                                        //set the value of the hidden element
                                        $frm.find('input[name="short_name"]').val(lang_val);
                                        //submit the form
                                        $frm.submit();
                                    });
                                })(jQuery);
                            </script>
                            @endpush
                            <div class="dropdown-menu list_language_swith" aria-labelledby="navbarDropdown">
                                @foreach ($global_language_data as $item)
                                    <a class="dropdown-item" href="#" data-value="{{ $item->short_name }}" {{ $current_short_name==$item->short_name ? 'style=font-style:italic;' : '' }}>{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                    @if ($global_setting_data && $global_setting_data->logo !="")
                        <div class="logo">
                            <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                                <img class="m-0 display-4" style="width: 287px;" src="{{ asset('upload/setting/front/'.$global_setting_data->logo) }}" alt="">
                            </a>
                        </div>
                    @else
                    <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal">News</span></h1>
                    </a>
                    @endif
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