@extends('admin.layout.app')

@section('title', 'Update Page About Content') 

@section('heading', 'Update Page About Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page About Content</h3> 
        </div>
        <div class="card-body">
            <form action="{{ route('admin_page_about_edit_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="about_title">Title *</label>
                    <input type="text" class="form-control @error('about_title') is-invalid @enderror" id="about_title" name="about_title" value="{{ old('about_title', $about_title) }}" placeholder="About Title">
                </div>
                <div class="form-group">
                    <label for="about_detail">Detail *</label>
                    <textarea name="about_detail" class="form-control" id="about_detail" cols="30" rows="10">{{ old('about_detail', $about_detail) }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="about_status">Status</label> <br>
                    <input type="checkbox" name="about_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('about_status', $about_status) == 'Show' ? 'checked' : '' }} >
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
        $('#about_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush