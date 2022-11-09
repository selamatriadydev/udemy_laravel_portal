@extends('admin.layout.app')

@section('title', 'Update Page Terms Content') 

@section('heading', 'Update Page Terms Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Terms Content</h3> 
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
                    <a href="{{ route('admin_page_terms_lang', $item->id) }}" class="btn {{ $btn_class }}"> <strong>{{ $item->short_name }}</strong> {{ $item->name }}</a>
                @endforeach
            </div>
            <form action="{{ route('admin_page_terms_edit_submit') }}" method="post">
                @csrf
                <input type="hidden" name="lang_id" value="{{ $lang_id }}">
                <div class="form-group">
                    <label for="terms_title">Title *</label>
                    <input type="text" class="form-control @error('terms_title') is-invalid @enderror" id="terms_title" name="terms_title" value="{{ old('terms_title', $terms_title) }}" placeholder="terms Title">
                </div>
                <div class="form-group">
                    <label for="terms_detail">Detail *</label>
                    <textarea name="terms_detail" class="form-control" id="terms_detail" cols="30" rows="10">{{ old('terms_detail', $terms_detail) }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="terms_status">Status</label> <br>
                    <input type="checkbox" name="terms_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('terms_status', $terms_status) == 'Show' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@push('scripts') 
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('#terms_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush