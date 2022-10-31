@extends('admin.layout.app')

@section('title', 'Update Page Privacy Policy Content') 

@section('heading', 'Update Page Privacy Policy Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Privacy Policy Content</h3> 
        </div>
        <div class="card-body">
            <form action="{{ route('admin_page_privacy_edit_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="privacy_title">Title *</label>
                    <input type="text" class="form-control @error('privacy_title') is-invalid @enderror" id="privacy_title" name="privacy_title" value="{{ old('privacy_title', $privacy_title) }}" placeholder="privacy Title">
                </div>
                <div class="form-group">
                    <label for="privacy_detail">Detail *</label>
                    <textarea name="privacy_detail" class="form-control" id="privacy_detail" cols="30" rows="10">{{ old('privacy_detail', $privacy_detail) }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="privacy_status">Status</label> <br>
                    <input type="checkbox" name="privacy_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('privacy_status', $privacy_status) == 'Show' ? 'checked' : '' }} >
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
        $('#privacy_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush