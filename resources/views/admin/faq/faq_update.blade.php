@extends('admin.layout.app')

@section('title', 'Update FAQ') 

@section('heading', 'Update FAQ')

@section('heading_nav', 'Update FAQ')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update FAQ</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_faq') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_faq_edit_submit', $faq_single->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_order">Language *</label>
                    <select name="language" id="language" class="form-control @error('language') is-invalid @enderror">
                        <option value="">Select Language</option>
                        @foreach ($language_data as $item)
                        <option value="{{ $item->id }}" {{ old('language', $faq_single->language_id) == $item->id ? 'selected' : '' }}>{{ $item->short_name }}-{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="faq_title">Title *</label>
                    <input type="text" class="form-control @error('faq_title') is-invalid @enderror" id="faq_title" name="faq_title" value="{{ old('faq_title', $faq_single->faq_title) }}" placeholder="FAQ Title">
                </div>
                <div class="form-group">
                    <label for="faq_detail">Detail *</label>
                    <textarea class="form-control @error('category_order') is-invalid @enderror" name="faq_detail" id="faq_detail" cols="30" rows="5">{{ old('faq_detail', $faq_single->faq_detail) }}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="faq_status">Status ?</label> <br>
                    <input type="checkbox" name="faq_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('faq_status', $faq_single->faq_status) == 'Show' ? 'checked' : '' }} >
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
        $('#faq_detail').summernote();
        // Bootstrap Switch 
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush