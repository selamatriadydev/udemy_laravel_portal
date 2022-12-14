@php
    $cat_lang_short_name = "en";
    if (!session()->get('lang_short_name')){
        if ($global_lang_default_data && $global_lang_default_data->short_name !=""){
            $cat_lang_short_name = $global_lang_default_data->short_name;
        }
    }else {
        $cat_lang_short_name = session()->get('lang_short_name');
    }
    $current_lang_id = \App\Models\Language::where('short_name', $cat_lang_short_name)->first()->id;
@endphp
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="{{ route('home') }}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{ HOME }}</a>
                <a href="{{ route('news_category') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'news_category' ? 'active' : '' }}">{{ CATEGORIES }}</a>
                {{-- <a href="{{ route('news_detail') }}" class="nav-item nav-link">Single News</a> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item">Menu item 1</a>
                        <a href="#" class="dropdown-item">Menu item 2</a>
                        <a href="#" class="dropdown-item">Menu item 3</a>
                    </div>
                </div> --}}
                {{-- setting global_nav_categories di app/provider/AppServiceProvider.php di bagian boot  --}}
                @foreach ($global_nav_categories as $item)
                    @if ($current_lang_id == $item->language_id)
                        <div class="nav-item dropdown">
                            <a href="javascript:void;" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $item->category_name }}</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach ($item->rSubCategory as $sub)
                                    <a href="{{ route('news_category_detail', $sub->id) }}" class="dropdown-item">{{ $sub->sub_category_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('galery/*') ? 'active' :'' }}" data-toggle="dropdown">{{ GALLERY }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('news_galery_photo') }}" class="dropdown-item">{{ PHOTO_GALLERY }}</a>
                        <a href="{{ route('news_galery_video') }}" class="dropdown-item">{{ VIDEO_GALLERY }}</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>