@extends('admin.layout.app')

@section('title', 'Update Page Login Content') 

@section('heading', 'Update Page Login Content')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Login Content</h3> 
        </div>
        <div class="card-body">
            <div class="btn-group d-flex">
                @foreach ($language_data as $item)
                    @php
                        $btn_class = "btn-outline-secondary";
                        $page_ready = \App\Models\Page::where('language_id', $item->id)->count();
                        if($page_ready){
                            $btn_class = "btn-outline-success";
                        }
                        if($lang_id==$item->id){
                            $btn_class = "btn-success";
                        }
                    @endphp
                    <a href="{{ route('admin_page_login_lang', $item->id) }}" class="btn {{ $btn_class }}"> <strong>{{ $item->short_name }}</strong> {{ $item->name }}</a>
                @endforeach
            </div>
            <form action="{{ route('admin_page_login_edit_submit') }}" method="post">
                @csrf
                <input type="hidden" name="lang_id" value="{{ $lang_id }}">
                <div class="form-group">
                    <label for="login_title">Title *</label>
                    <input type="text" class="form-control @error('login_title') is-invalid @enderror" id="login_title" name="login_title" value="{{ old('login_title', $login_title) }}" placeholder="Login Title">
                </div>
    
                <div class="form-group">
                    <label for="login_status">Status</label> <br>
                    <input type="checkbox" name="login_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('login_status', $login_status) == 'Show' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@push('scripts') 
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function () {
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush