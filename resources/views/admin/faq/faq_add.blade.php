@extends('admin.layout.app')

@section('title', 'New FAQ') 

@section('heading', 'New FAQ')
@section('heading_nav', 'New FAQ')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush
@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New FAQ</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_faq') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_faq_add_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="faq_title">Title *</label>
                    <input type="text" class="form-control @error('faq_title') is-invalid @enderror" id="faq_title" name="faq_title" value="{{ old('faq_title') }}" placeholder="FAQ Title">
                </div>
                <div class="form-group">
                    <label for="faq_detail">Detail *</label>
                    <textarea class="form-control @error('category_order') is-invalid @enderror" name="faq_detail" id="faq_detail" cols="30" rows="5">{{ old('faq_detail') }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="faq_status">Status ?</label> <br>
                    @php
                        $faq_status = "Show";
                    @endphp
                    <input type="checkbox" name="faq_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('faq_status', $faq_status) == 'Show' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
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
        $('#faq_detail').summernote();
        // Bootstrap Switch 
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush