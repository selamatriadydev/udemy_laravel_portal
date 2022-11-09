<div class="container-fluid pt-5 px-sm-3 px-md-5 mt-5" style="background-color: #1E2024">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ FOOTER_COL_1_HEADING }}</h5>
            <div class="m-n1 footer-about-short-text about">
                {{ ABOUT_TEXT }}
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ FOOTER_COL_2_HEADING }}</h5>
            <div class="m-n1 contact">
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>{{ FOOTER_ADRESS }}</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>{{ FOOTER_PHONE }}</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>{{ FOOTER_EMAIL }}</p>
                @if ($global_footer_social_items)
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">{{ FOLLOW_US }}</h6> 
                <div class="d-flex justify-content-start social-item">
                    @foreach ($global_footer_social_items as $item)
                        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ FOOTER_COL_3_HEADING }}</h5>
            <div class="m-n1">
                <ul class="navbar-nav ml-auto mr-n2 useful_link">
                    <li class="nav-item">
                        <a class="nav-link small text-white" href="{{ route('home') }}">{{ HOME }}</a>
                    </li>
                    @php
                        $page_data = \App\Models\Page::where('language_id', CURRENT_LANG_ID)->first();
                    @endphp
                    @if ($page_data)
                        @if ($page_data->terms_status == 'Show')
                            <li class="nav-item">
                                <a class="nav-link small text-white" href="{{ route('terms') }}">{{ $page_data->terms_title }}</a>
                            </li>
                        @endif
                        @if ($page_data->privacy_status == 'Show')
                            <li class="nav-item">
                                <a class="nav-link small text-white" href="{{ route('privacy') }}">{{ $page_data->privacy_title }}</a>
                            </li>
                        @endif
                        @if ($page_data->disclaimer_status == 'Show')
                            <li class="nav-item">
                                <a class="nav-link small text-white" href="{{ route('disclaimer') }}">{{ $page_data->disclaimer_title }}</a>
                            </li>
                        @endif
                        @if ($page_data->contact_status == 'Show')
                            <li class="nav-item">
                                <a class="nav-link small text-white" href="{{ route('contact') }}">{{ $page_data->contact_title }}</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ FOOTER_COL_4_HEADING }}</h5>
            <div class="row news_letter">
                <P>{{ NEWSLETTER_TEXT }}</P>
                <form action="{{ route('subscriber') }}" method="post" class="subcriber_form_ajax">
                    @csrf
                    <div class="input-group mb-2" style="width: 100%;">
                        <input type="text" class="form-control form-control-lg" name="email" placeholder="{{ EMAIL_ADDRESS }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3" type="submit">{{ SUBSCRIBE_NOW }}</button>
                        </div>
                    </div>
                    {{-- <span class="text-danger error-text email_error"></span> --}}
                    <div class="alert alert-success email_success" role="alert" style="display: none"></div> 
                    <div class="alert alert-danger email_error" role="alert" style="display: none"></div> 
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5 footer-app" style="background: #111111;" >
    <p class="m-0 text-center">{{ COPYRIGHT_TEXT }}</p>
</div>

@push('script')
<div id="form_subcriber_loader" class="form_subcriber_spinner form_subcriber_loading"></div>
<script>
    (function($){
        $('.subcriber_form_ajax').on('submit', function(event){
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
                    $(form).find('div.email_success').attr('style', 'display: none').text('');
                    $(form).find('div.email_error').attr('style', 'display: none').text('');
                },
                success: function(data){
                    $('#form_subcriber_loader').hide();
                    if(data.code == 0){
                        $.each(data.error_message, function(prefix, val){
                            $(form).find('div.'+prefix+'_error').attr('style', '').text(val[0]);
                        })
                    }else if(data.code == 1){
                        $(form)[0].reset();
                        $(form).find('div.email_success').attr('style', '').text(data.success_message);
                    }else{
                        $(form)[0].reset();
                        $(form).find('div.email_success').attr('style', '').text(data.success_message);
                    }
                }
            })
        })
    })(jQuery);
    
</script>
    
@endpush