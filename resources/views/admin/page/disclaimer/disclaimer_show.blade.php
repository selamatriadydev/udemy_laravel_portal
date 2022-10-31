@extends('admin.layout.app')

@section('title', 'Update Page Disclaimer Content') 

@section('heading', 'Update Page Disclaimer Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">  
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Disclaimer Content</h3> 
        </div>
        <div class="card-body">
            <form action="{{ route('admin_page_disclaimer_edit_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="disclaimer_title">Title *</label>
                    <input type="text" class="form-control @error('disclaimer_title') is-invalid @enderror" id="disclaimer_title" name="disclaimer_title" value="{{ old('disclaimer_title', $disclaimer_title) }}" placeholder="disclaimer Title">
                </div>
                <div class="form-group">
                    <label for="disclaimer_detail">Detail *</label>
                    <textarea name="disclaimer_detail" class="form-control" id="disclaimer_detail" cols="30" rows="10">{{ old('disclaimer_detail', $disclaimer_detail) }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="disclaimer_status">Status</label> <br>
                    <input type="checkbox" name="disclaimer_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('disclaimer_status', $disclaimer_status) == 'Show' ? 'checked' : '' }} >
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
        $('#disclaimer_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush