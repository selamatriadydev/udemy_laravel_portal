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
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Home</a>
                <a href="{{ route('news_category') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'news_category' ? 'active' : '' }}">Category</a>
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
                    <div class="nav-item dropdown">
                    <a href="javascript:void;" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $item->category_name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @foreach ($item->rSubCategory as $sub)
                            <a href="{{ route('news_category_detail', $sub->id) }}" class="dropdown-item">{{ $sub->sub_category_name }}</a>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('galery/*') ? 'active' :'' }}" data-toggle="dropdown">Galery</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('news_galery_photo') }}" class="dropdown-item">Photo</a>
                        <a href="{{ route('news_galery_video') }}" class="dropdown-item">Video</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>