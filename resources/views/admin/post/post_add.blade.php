@extends('admin.layout.app')

@section('title', 'New Post') 

@section('heading', 'New Post')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Post</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_post') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_post_add_submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_name"> Category Name *</label>
                    <select name="category_name" id="category_name" class="form-control select2bs4 @error('category_name') is-invalid @enderror">
                        @foreach ($category as $item)
                            <optgroup label="{{ $item->category_name }}">
                                @foreach ($item->rSubCategory as $sub)
                                    <option value="{{ $sub->id }}" {{ old('category_name') == $sub->id ? 'selected' : '' }}>{{ $sub->sub_category_name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_title">Post Title *</label>
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title" name="post_title" value="{{ old('post_title') }}" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="post_detail">Post Detail *</label>
                    <textarea class="form-control @error('post_detail') is-invalid @enderror" name="post_detail" id="post_detail" cols="30" rows="10">{{ old('post_detail') }}</textarea>
                    @error('post_detail') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="post_photo">Post Photo *</label>
                    <input type="file" class="form-control @error('post_photo') is-invalid @enderror" id="post_photo" name="post_photo" value="{{ old('post_photo') }}" placeholder="Post Photo">
                </div>
                <div class="form-group">
                    <label for="post_tag">Tags</label>
                    <input type="text" class="form-control @error('post_tag') is-invalid @enderror" id="post_tag" name="post_tag" value="{{ old('post_tag') }}" placeholder="Post Tags">
                </div>
                <div class="form-group">
                    <label for="is_share">Is Share ?</label> <br>
                    <input type="checkbox" name="is_share"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="YES" data-off-text="NO" {{ old('is_share') == '1' ? 'checked' : '' }} >
                </div>
                <div class="form-group">
                    <label for="is_comment">Is Comment ?</label> <br>
                    <input type="checkbox" name="is_comment"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="YES" data-off-text="NO" {{ old('is_comment') == '1' ? 'checked' : '' }} >
                </div>
                <div class="form-group">
                    <label for="is_publish">Is Publish ?</label> <br>
                    <input type="checkbox" name="is_publish"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="PUBLISH" data-off-text="DRAFT" {{ old('is_publish') == '1' ? 'checked' : '' }} >
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
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('#post_detail').summernote();
        // Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush