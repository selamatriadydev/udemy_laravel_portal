@extends('admin.layout.app')

@section('title', 'Update Page Contact Content') 

@section('heading', 'Update Page Contact Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Contact Content</h3> 
        </div>
        <div class="card-body">
            <form action="{{ route('admin_page_contact_edit_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="contact_title">Title *</label>
                    <input type="text" class="form-control @error('contact_title') is-invalid @enderror" id="contact_title" name="contact_title" value="{{ old('contact_title', $contact_title) }}" placeholder="Contact Title">
                </div>
                <div class="form-group">
                    <label for="contact_detail">Detail *</label>
                    <textarea name="contact_detail" class="form-control" id="contact_detail" cols="30" rows="10">{{ old('contact_detail', $contact_detail) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="contact_map">Map (iFrame Code)</label>
                    <textarea name="contact_map" class="form-control  @error('contact_map') is-invalid @enderror" id="contact_map" cols="10" rows="5">{{ old('contact_map', $contact_map) }}</textarea>
                    <span>for setting map <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">Click Here</a> </span>
                </div>
                <div class="form-group">
                    <label for="contact_status">Status</label> <br>
                    <input type="checkbox" name="contact_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('contact_status', $contact_status) == 'Show' ? 'checked' : '' }} >
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
        $('#contact_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush