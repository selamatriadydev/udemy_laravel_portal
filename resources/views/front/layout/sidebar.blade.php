@push('style')
    <style>
        #form_subcriber_loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.75);
            z-index: 10000;
        }
        .form_subcriber_spinner.form_subcriber_loading {
            display: none;
            padding: 50px;
            text-align: center;
        }
        #form_subcriber_spinner_primary {
            border-color: #FFCC00 #ccc #ccc !important;
        }
        .form_subcriber_spinner.form_subcriber_loading:before {
            content: "";
            height: 90px;
            width: 90px;
            margin: -15px auto auto -15px;
            position: absolute;
            top: calc(50% - 45px);
            left: calc(50% - 45px);
            border-width: 8px;
            border-style: solid;
            border-color: #FFCC00 #ccc #ccc;
            border-radius: 100%;
            animation: rotation_subcriber_form .7s infinite linear;
        }
        @keyframes rotation_subcriber_form {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }
    </style>
@endpush
<div class="col-lg-4">
    <!-- Social Follow Start -->
    {{-- <div class="mb-3">
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
    </div> --}}
    <!-- Social Follow End -->

    <!-- Live channel Start -->
    @if ($global_live_channel_data)
        <div class="mb-3">
            @foreach ($global_live_channel_data as $item)
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $item->heading }}</h4>
                </div>
                <div class="bg-white text-center border border-top-0 p-3">
                    <iframe width="330" height="205" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
    @endif
    <!-- Live channel End -->

     <!-- Ads Start -->
     @if ($global_sidebar_ad_data && $global_sidebar_ad_data->above_ad)
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
            </div>
            <div class="bg-white text-center border border-top-0 p-3">
                {{-- setting global_sidebar_ad_data di app/provider/AppServiceProvider.php di bagian boot  --}}
                @if ($global_sidebar_ad_data->above_ad_url)
                    <a href="{{ $global_sidebar_ad_data->above_ad_url }}"><img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_sidebar_ad_data->above_ad) }}" alt="Sidebar"></a>
                @else
                    <img class="img-fluid" src="{{ asset('upload/advertisement/'.$global_sidebar_ad_data->above_ad) }}" alt="Sidebar">
                @endif
            </div>
        </div>
    @endif
    <!-- Ads End -->


    <!-- Category Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">CATEGORIES</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach ($global_news_sub_category as $item)
                    <a href="{{ route('news_category_detail', $item->id) }}" class="btn btn-sm btn-outline-secondary text-uppercase m-1">{{ $item->sub_category_name }} <span class="right badge badge-primary">{{ $item->r_front_post_count }}</span></a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- Tags Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach ($global_news_tags as $item)
                    <a href="{{ route('news_tag', $item->tag_name) }}" class="btn btn-sm btn-outline-secondary text-uppercase m-1">{{ $item->tag_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Tags End -->

    <!-- Category Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Archive News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @php
                    $archive_arr = [];
                    foreach ($global_archive_news_data as $item){
                        $ts = strtotime($item->created_at);
                        // $created_date = date('d F, Y', $ts);
                        $created_month = date('F', $ts);
                        $created_month_int = date('m', $ts);
                        $created_year = date('Y', $ts);

                        $archive_arr[] = $created_month_int."-".$created_month."-".$created_year;
                    }
                    $archive_arr = array_values(array_unique($archive_arr));
                    // print_r($archive_arr);
                @endphp
                <form action="{{ route('archive') }}" method="post" style="width: 100%;">
                    @csrf
                    <select class="form-control" id="archive_news" name="archive_news" onchange="this.form.submit()">
                        <option value="">Select Month </option>
                        @foreach ($archive_arr as $item)
                            @php
                                $arr_item = explode('-', $item);
                            @endphp
                            <option value="{{ $arr_item[0]."-".$arr_item[2] }}">{{ $arr_item[1] }}, {{ $arr_item[2] }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Popular & Recent News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <nav>
                <div class="nav nav-tabs nav-fill popular_recent" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-RecentNews-tab" data-toggle="tab" href="#nav-RecentNews" role="tab" aria-controls="nav-RecentNews" aria-selected="true"> Recent News</a>
                  <a class="nav-item nav-link" id="nav-PopularNews-tab" data-toggle="tab" href="#nav-PopularNews" role="tab" aria-controls="nav-PopularNews" aria-selected="false">Popular News</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-RecentNews" role="tabpanel" aria-labelledby="nav-RecentNews-tab">
                    @if ($global_sidebar_recent_news)
                        @foreach ($global_sidebar_recent_news as $item)
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
                                        <br><a class="text-body" href=""><small>{{ $updated_date }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        NO Data
                    @endif
                </div>
                <div class="tab-pane fade" id="nav-PopularNews" role="tabpanel" aria-labelledby="nav-PopularNews-tab">
                    @if ($global_sidebar_popular_news)
                        @foreach ($global_sidebar_popular_news as $item)
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
                                         <br><a class="text-body" href=""><small>{{ $updated_date }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold post-title-short-text" href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        NO Data
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Popular News End -->

    <!-- Newsletter Start -->
    {{-- <div class="mb-3"> 
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <form action="{{ route('subscriber') }}" method="post" class="subcriber_form_ajax">
                @csrf
                <div class="input-group mb-2" style="width: 100%;">
                    <input type="text" class="form-control form-control-lg" name="email" placeholder="Your Email">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-3" type="submit">Subscibe Now</button>
                    </div>
                </div>
                <div class="alert alert-success email_success" role="alert" style="display: none"></div> 
                <div class="alert alert-danger email_error" role="alert" style="display: none"></div> 
            </form>
        </div>
    </div> --}}
    <!-- Newsletter End -->

    <!-- Online Poll Start -->
    @if ($global_online_poll_data)
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">Online Poll</h4>
            </div>
            <div class="bg-white border border-top-0 p-3">
                <div class="d-flex flex-wrap m-n1">
                    <p>{{ $global_online_poll_data->question }}</p>
                </div>
                @php
                    $total_vote = $global_online_poll_data->yes_vote+$global_online_poll_data->no_vote;
                    $total_yes_percentage = 0;
                    if($global_online_poll_data->yes_vote > 0){
                        $total_yes_percentage = ($global_online_poll_data->yes_vote*100)/$total_vote;
                        $total_yes_percentage = ceil($total_yes_percentage);
                    }
                    $total_no_percentage = 0;
                    if($global_online_poll_data->no_vote > 0){
                        $total_no_percentage = ($global_online_poll_data->no_vote*100)/$total_vote;
                        $total_no_percentage = ceil($total_no_percentage);
                    }
                @endphp

                @if ( session()->get('current_poll_id') == $global_online_poll_data->id ) 
                <div id="poll_table">
                @else
                <div  id="poll_table" style="display: none">
                @endif
                    <table class="table table-border">
                        <tbody>
                            <tr>
                                <td width="100px"><span id="tb_lb_yes_vote">Yes ({{ $global_online_poll_data->yes_vote }}) </span></td>                  
                                <td>
                                    <div class="progress-bar bg-success" id="tb_td_yes_vote" role="progressbar" style="width: {{ $total_yes_percentage }}%;" aria-valuenow="{{ $total_yes_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_percentage }}%</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span id="tb_lb_no_vote">No ({{ $global_online_poll_data->no_vote }})</span></td>
                                <td>
                                    <div class="progress-bar bg-danger" id="tb_td_no_vote" role="progressbar" style="width: {{ $total_no_percentage }}%;" aria-valuenow="{{ $total_no_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_percentage }}%</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="{{ route('poll_previous') }}" class="btn btn-primary">Previous Poll</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ( session()->get('current_poll_id') != $global_online_poll_data->id ) 
                    <div id="poll_form">
                        <form action="{{ route('poll_submit') }}" method="post" class="poll_form_ajax">
                            @csrf
                            <input type="hidden" name="poll_id" value="{{ $global_online_poll_data->id }}">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vote_question" id="vote_question" value="yes" checked>
                                <label class="form-check-label" for="vote_question">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vote_question" id="vote_question" value="no">
                                <label class="form-check-label" for="vote_question"> No</label>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('poll_previous') }}" class="btn btn-light">Previous Poll</a>
                            </div>
                            {{-- <span class="text-danger error-text email_error"></span> --}}
                            <div class="alert alert-success vote_success" role="alert" style="display: none"></div> 
                            <div class="alert alert-warning vote_warning" role="alert" style="display: none"></div> 
                            <div class="alert alert-danger vote_error" role="alert" style="display: none"></div> 
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <!-- Online Poll End -->
</div>
{{-- <div id="form_subcriber_loader" class="form_subcriber_spinner form_subcriber_loading"></div> --}}
@push('script')
    <script>
        (function($){
            // $('.subcriber_form_ajax').on('submit', function(event){
            //     event.preventDefault();
            //     $('#form_subcriber_loader').show();
            //     var form = this;
            //     $.ajax({
            //         url: $(form).attr('action'),
            //         type: $(form).attr('method'),
            //         data: new FormData(form),
            //         processData: false,
            //         dataType: 'json',
            //         contentType: false,
            //         beforeSend: function(){
            //             $(form).find('div.email_success').attr('style', 'display: none').text('');
            //             $(form).find('div.email_error').attr('style', 'display: none').text('');
            //         },
            //         success: function(data){
            //             $('#form_subcriber_loader').hide();
            //             if(data.code == 0){
            //                 $.each(data.error_message, function(prefix, val){
            //                     $(form).find('div.'+prefix+'_error').attr('style', '').text(val[0]);
            //                 })
            //             }else if(data.code == 1){
            //                 $(form)[0].reset();
            //                 $(form).find('div.email_success').attr('style', '').text(data.success_message);
            //             }else{
            //                 $(form)[0].reset();
            //                 $(form).find('div.email_success').attr('style', '').text(data.success_message);
            //             }
            //         }
            //     })
            // })

            $('.poll_form_ajax').on('submit', function(event){
                event.preventDefault();
                $('#form_subcriber_loader').show();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        $(form).find('div.vote_success').attr('style', 'display: none').text('');
                        $(form).find('div.vote_warning').attr('style', 'display: none').text('');
                        $(form).find('div.vote_error').attr('style', 'display: none').text('');
                    },
                    success: function(data){
                        $('#form_subcriber_loader').hide();
                        if(data.code == 0){
                            $.each(data.error_message, function(prefix, val){
                                $(form).find('div.vote_error').attr('style', '').text(val[0]);
                            })
                        }else if(data.code == 1){
                            $(form)[0].reset();
                            if(data.data){
                                $('#tb_lb_yes_vote').text('Yes ('+data.data.yes+')');
                                $('#tb_td_yes_vote').attr('style', 'width:'+data.data.yes_percen+'%').attr('aria-valuenow', data.data.yes_percen).text(data.data.yes_percen+'%');
                                $('#tb_lb_no_vote').text('No ('+data.data.no+')');
                                $('#tb_td_no_vote').attr('style', 'width:'+data.data.no_percen+'%').attr('aria-valuenow', data.data.no_percen).text(data.data.no_percen+'%');
                            }
                            $("#poll_form").empty();
                            $("#poll_table").attr('style', '');
                            $(form).find('div.vote_success').attr('style', '').text(data.success_message);
                        }else{
                            $(form)[0].reset();
                            $(form).find('div.vote_warning').attr('style', '').text(data.warning_message);
                        }
                    }
                })
            })
        })(jQuery);
        
    </script>
@endpush