@extends('admin.layout.app')

@section('title', 'Front Setting')

@section('heading', 'Front Setting')
@section('heading_nav', 'Front Setting')

@push('style')
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

@section('main_content')
<div id="setting_front">
<div class="card card-primary">
    <div class="card-body row">
      <div class="col-3 d-flex">
        <ul class="nav nav-pills flex-column">
            {{-- <li class="nav-item">
              <a href="{{ route('admin_setting_front_tranding') }}" class="nav-link {{ Route::currentRouteName() =='admin_setting_front_tranding' ? 'active disabled' :'' }}">
              <i class="far fa-file-alt"></i> News Tranding
              </a>
            </li> --}}
            <li class="nav-item">
                <a data-toggle="collapse" href="#home" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#logo_and_favicon" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Logo and Favicon
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#top_bar" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Top Bar
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#theme_color" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Theme Color
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#google_analytic" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Google Analytic
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#disqus" aria-expanded="false" class="nav-link collapsed">
                    <i class="far fa-file-alt"></i> Disqus Comment
                </a>
            </li>
        </ul>
      </div>
      <div class="col-9">
        <form action="{{ route('admin_setting_front_submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            @php
            $news_tranding_total = "";
            $news_tranding_status = "";
            $news_video_total = "";
            $news_video_status = "";
            $top_bar_date_status = "";
            $top_bar_email ="";
            $top_bar_email_status = "";
            $theme_color_1 = "";
            $theme_color_2 = "";
            $analytic_id = "";
            $analytic_id_status = "";
            $disqus_code = "";
            $disqus_status = "";
            if($front_setting){
                $news_tranding_total = $front_setting->news_tranding_total;
                $news_tranding_status = $front_setting->news_tranding_status;
                $news_video_total = $front_setting->video_total;
                $news_video_status = $front_setting->video_status;
                $top_bar_date_status = $front_setting->top_bar_date_status;
                $top_bar_email =$front_setting->top_bar_email;
                $top_bar_email_status = $front_setting->top_bar_email_status;
                $theme_color_1 = $front_setting->theme_color_1;
                $theme_color_2 = $front_setting->theme_color_2;
                $analytic_id = $front_setting->analytic_id;
                $analytic_id_status = $front_setting->analytic_id_status;
                $disqus_code = $front_setting->disqus_code;
                $disqus_status = $front_setting->disqus_status;
            }
            @endphp
            <div id="home" class="collapse show" data-parent="#setting_front" style="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="news_tranding_total">News Tranding Total </label>
                        <input type="text" id="news_tranding_total" name="news_tranding_total" class="form-control @error('news_tranding_total') is_invalid @enderror" value="{{ old('news_tranding_total', $news_tranding_total) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="news_tranding_status">News Tranding Status</label> <br>
                        <input type="checkbox" name="news_tranding_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('news_tranding_status', $news_tranding_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="news_video_total">Video Item Total </label>
                        <input type="text" id="news_video_total" name="news_video_total" class="form-control @error('news_video_total') is_invalid @enderror" value="{{ old('news_video_total', $news_video_total) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="news_video_status">Video Item Status</label> <br>
                        <input type="checkbox" name="news_video_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('news_video_status', $news_video_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>

            <div id="logo_and_favicon" class="collapse" data-parent="#setting_front" style="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="setting_logo"> Existing Favicon</label>
                        @if ($front_setting && $front_setting->favicon)
                            <div>
                                <img class="img-fluid" style="width: 200px" src="{{ asset('upload/setting/front/'.$front_setting->favicon)}}" alt="Photo" >
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="setting_favicon"> Existing Logo</label>
                        @if ($front_setting && $front_setting->logo)
                            <div>
                                <img class="img-fluid" style="width: 200px" src="{{ asset('upload/setting/front/'.$front_setting->logo)}}" alt="Photo" >
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="setting_favicon">Change Favicon</label>
                        <input type="file" class="form-control @error('setting_favicon') is-invalid @enderror" id="setting_favicon" name="setting_favicon" value="{{ old('setting_favicon') }}" placeholder="Post Photo">
                    </div>
                    <div class="col-md-6">
                        <label for="setting_logo">Change Logo</label>
                        <input type="file" class="form-control @error('setting_logo') is-invalid @enderror" id="setting_logo" name="setting_logo" value="{{ old('setting_logo') }}" placeholder="Post Photo">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>


            <div id="top_bar" class="collapse" data-parent="#setting_front" style="">
                <div class="form-group"> 
                    <label for="top_bar_date_status">Date Status</label> <br>
                    <input type="checkbox" name="top_bar_date_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('top_bar_date_status', $top_bar_date_status) == 'Show' ? 'checked' : '' }} >
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="top_bar_email">Email Address *</label>
                        <input type="text" id="top_bar_email" name="top_bar_email" class="form-control @error('top_bar_email') is_invalid @enderror" value="{{ old('top_bar_email', $top_bar_email) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="top_bar_email_status">Email Status</label> <br>
                        <input type="checkbox" name="top_bar_email_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('top_bar_email_status', $top_bar_email_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>


            <div id="theme_color" class="collapse" data-parent="#setting_front" style="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group js_theme_color_1">
                            <label for="theme_color_1">Theme Color 1 *</label>
                            <input type="text" id="theme_color_1" name="theme_color_1" class="form-control @error('theme_color_1') is_invalid @enderror" value="{{ old('theme_color_1', $theme_color_1) }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"   style="{{ old('theme_color_1', $theme_color_1) ? 'color:'.old('theme_color_1', $theme_color_1) : '' }}"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group js_theme_color_2">
                            <label for="theme_color_2">Theme Color 2 *</label>
                            <input type="text" id="theme_color_2" name="theme_color_2" class="form-control @error('theme_color_2') is_invalid @enderror" value="{{ old('theme_color_2', $theme_color_2) }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square" style="{{ old('theme_color_2', $theme_color_2) ? 'color:'.old('theme_color_2', $theme_color_2) : '' }}"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>

            <div id="google_analytic" class="collapse" data-parent="#setting_front" style="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="analytic_id">Google Analytic ID *</label>
                        <input type="text" id="analytic_id" name="analytic_id" class="form-control @error('analytic_id') is_invalid @enderror" value="{{ old('analytic_id', $analytic_id) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="analytic_id_status">Google Analytic Status</label> <br>
                        <input type="checkbox" name="analytic_id_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('analytic_id_status', $analytic_id_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>

            <div id="disqus" class="collapse" data-parent="#setting_front" style="">
                
                    <div class="form-group">
                        <label for="disqus_code">Disqus Code *</label>
                        <textarea name="disqus_code" id="disqus_code" cols="30" rows="10" class="form-control @error('disqus_code') is_invalid @enderror" style="height: 200px;">{{ old('disqus_code', $disqus_code) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="disqus_status">Disqus Status</label> <br>
                        <input type="checkbox" name="disqus_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('disqus_status', $disqus_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts') 
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script>
    $(function () {
        //color picker with addon
        $('.js_theme_color_1').colorpicker();
        $('.js_theme_color_1').on('colorpickerChange', function(event) {
            $('.js_theme_color_1 .fa-square').css('color', event.color.toString());
        });
        //color picker with addon
        $('.js_theme_color_2').colorpicker();
        $('.js_theme_color_2').on('colorpickerChange', function(event) {
            $('.js_theme_color_2 .fa-square').css('color', event.color.toString());
        });
        // <!-- Bootstrap Switch -->
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush