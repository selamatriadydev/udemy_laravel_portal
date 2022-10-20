@extends('admin.layout.app')

@section('title', 'Setting')

@section('heading', 'Setting')

@section('main_content')
<div class="card card-primary">
    <div class="card-body row">
      <div class="col-3 d-flex">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('admin_setting_front_tranding') }}" class="nav-link">
                <i class="far fa-file-alt"></i> Logo
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin_setting_front_tranding') }}" class="nav-link {{ Route::currentRouteName() =='admin_setting_front_tranding' ? 'active disabled' :'' }}">
              <i class="far fa-file-alt"></i> News Tranding
              </a>
          </li>
        </ul>
      </div>
      <div class="col-9">
        @switch(Route::currentRouteName())
            @case('admin_setting_front_tranding')
                <form action="{{ route('admin_setting_front_tranding_submit') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="news_tranding_total">News Tranding Total </label>
                      <input type="text" id="news_tranding_total" name="news_tranding_total" class="form-control" value="{{ old('news_tranding_total', $news_tranding_total) }}">
                    </div>
                    <div class="form-group">
                        <label for="news_tranding_status">News Tranding Status</label> <br>
                        <input type="checkbox" name="news_tranding_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                        data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('news_tranding_status', $news_tranding_status) == 'Show' ? 'checked' : '' }} >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save News Tranding</button>
                    </div>
                </form>
                @break
            @default
            <form action="{{ route('admin_setting_front_tranding_submit') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="photos_show"> Existing Photo</label>
                  @if ($post_single->post_photo)
                      <div>
                          <img class="img-fluid" style="width: 300px" src="{{ asset('upload/post/'.$post_single->post_photo)}}" alt="Photo" >
                      </div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="post_photo">Change Photo</label>
                  <input type="file" class="form-control @error('post_photo') is-invalid @enderror" id="post_photo" name="post_photo" value="{{ old('post_photo') }}" placeholder="Post Photo">
              </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save News Tranding</button>
                </div>
            </form>
                
        @endswitch
      </div>
    </div>
  </div>
@endsection
@push('scripts') 
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush