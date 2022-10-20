<div class="col-lg-4">
    <!-- Social Follow Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Fans</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Connects</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Subscribers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
        </div>
    </div>
    <!-- Social Follow End -->

    <!-- Ads Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            {{-- setting global_sidebar_ad_data di app/provider/AppServiceProvider.php di bagian boot  --}}
            @if ($global_sidebar_ad_data && $global_sidebar_ad_data->above_ad)
                @if ($global_sidebar_ad_data->above_ad_url)
                    <a href="{{ $global_sidebar_ad_data->above_ad_url }}"><img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_sidebar_ad_data->above_ad) }}" alt="Sidebar"></a>
                @else
                    <img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_sidebar_ad_data->above_ad) }}" alt="Sidebar">
                @endif
            @endif
        </div>
    </div>
    <!-- Ads End -->


    <!-- Category Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Category News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach ($global_news_sub_category as $item)
                    <a href="{{ route('news_category_detail', $item->id) }}" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">{{ $item->sub_category_name }} <span class="right badge badge-danger">{{ $item->r_front_post_count }}</span></a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            @foreach ($global_news_tranding as $item)
                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <img class="img-fluid" src="{{ asset('upload/post/'.$item->post_photo)}}" style="width: 110px" alt="">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $item->rSubCategory ? $item->rSubCategory->sub_category_name : '' }}</a>
                            @php
                            $updated_date = "";
                            if($item->updated_at){
                                $ts = strtotime($item->updated_at);
                                $updated_date = date('d F, Y', $ts);
                            }
                            @endphp
                            <a class="text-body" href=""><small>{{ $updated_date }}</small></a>
                        </div>
                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->

    <!-- Newsletter Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
            <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
            </div>
            <small>Lorem ipsum dolor sit amet elit</small>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Tags Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach ($global_news_tags as $item)
                    <a href="{{ route('news_tag', $item->tag_name) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $item->tag_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Tags End -->
</div>