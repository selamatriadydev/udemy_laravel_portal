@extends('author.layout.app')

@section('title', 'Update Post') 

@section('heading', 'Update Post')
@section('heading_nav', 'Update Post')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('main_content')
      <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Update Post</h3> 
            <div class="card-tools">
                <a href="{{ route('author_post') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body"> 
            <form action="{{ route('author_post_edit_submit', $post_single->id) }}" method="post" enctype="multipart/form-data" id="update_post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="category_order">Language *</label>
                        <select name="language" id="language" class="form-control language @error('language') is-invalid @enderror">
                            {{-- <option value="">Select Language</option>  --}}
                            @foreach ($language_data as $item)
                            <option value="{{ $item->id }}" {{ old('language', $post_single->language_id) == $item->id ? 'selected' : '' }}>{{ $item->short_name }}-{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category_name"> Category Name *</label>
                        <select name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror">
                            @foreach ($category as $item)
                                <optgroup id="{{ $item->language_id }}" label="{{ $item->category_name }}">
                                    @foreach ($item->rSubCategory as $sub)
                                        <option value="{{ $sub->id }}" {{ old('category_name', $post_single->sub_category_id) == $sub->id ? 'selected' : '' }}>{{ $sub->sub_category_name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post_title">Post Title *</label>
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title" name="post_title" value="{{ old('post_title', $post_single->post_title) }}" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="post_detail">Post Detail *</label>
                    <textarea class="form-control @error('post_detail') is-invalid @enderror" name="post_detail" id="post_detail" cols="30" rows="10">{{ old('post_detail', $post_single->post_detail) }}</textarea>
                    @error('post_detail') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="post_photo">Post Photo *</label>
                        <input type="file" class="form-control @error('post_photo') is-invalid @enderror" id="post_photo" name="post_photo" value="{{ old('post_photo') }}" placeholder="Post Photo">
                    </div>
                    <div class="col-md-6">
                        <label for="post_photo_exist">Photo *</label>
                        <div id="post_photo_exist">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse-post_photo_exist" aria-expanded="false">
                                        Existing Post Photo
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapse-post_photo_exist" class="collapse" data-parent="#post_photo_exist" style="">
                                    <div class="card-body">
                                        <img class="img-fluid" id="photos_show" style="width: 300px" src="{{ asset('upload/post/'.$post_single->post_photo)}}" alt="Photo" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="post_tag">New Tags</label>
                        <input type="text" class="form-control @error('post_tag') is-invalid @enderror" id="post_tag" name="post_tag" value="{{ old('post_tag') }}" placeholder="Post Tags">
                    </div>
                    <div class="col-md-6">
                        <label for="post_tag_exist">Existing Tags</label>
                        @if ($post_single->rTag)
                            <div id="post_tag_exist">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse-post_tag_exist" aria-expanded="false">
                                            Existing Tags
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-post_tag_exist" class="collapse" data-parent="#post_tag_exist" style="">
                                        <div class="card-body">
                                            <table class="table table-bordered table-valign-middle">
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($post_single->rTag as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->tag_name }}</td>
                                                        <td> <a class="btn btn-danger btn-sm" href="{{ route('author_post_delete_tag', ['post_id'=> $post_single->id, 'tag_id'=>$item->id] ) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div>No Existing Tags</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="is_share">Is Share ?</label> <br>
                        <input type="checkbox" name="is_share"  data-bootstrap-switch data-off-color="danger" value="1"
                        data-on-color="success" data-on-text="YES" data-off-text="NO" {{ old('is_share', $post_single->is_share) == '1' ? 'checked' : '' }} >
                    </div>
                    <div class="col-md-4">
                        <label for="is_comment">Is Comment ?</label> <br>
                        <input type="checkbox" name="is_comment"  data-bootstrap-switch data-off-color="danger" value="1"
                        data-on-color="success" data-on-text="YES" data-off-text="NO" {{ old('is_comment', $post_single->is_comment) == '1' ? 'checked' : '' }} >
                    </div>
                    <div class="col-md-4">
                        <label for="is_publish">Is Publish ?</label> <br>
                        <input type="checkbox" name="is_publish"  data-bootstrap-switch data-off-color="danger" value="1"
                        data-on-color="success" data-on-text="PUBLISH" data-off-text="DRAFT" {{ old('is_publish', $post_single->is_publish) == '1' ? 'checked' : '' }} >
                    </div>
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
        });

        $(document).ready( function(){
            var $category = $("#category_name > optgroup").clone();
            var postSelected = $('#language').val();
            if(postSelected){
                if($category.clone().filter('[id="' + postSelected + '"]').length){
                    $('#update_post').find("#category_name").html($category.clone().filter('[id="' + postSelected + '"]'));
                }else{
                    $('#update_post').find("#category_name").html('<option>Select Language</option>');
                }
            }
            $('#language').on("change", function() {
                var selectedLang = $(this).val();
                // alert(selectedLang)
                if(selectedLang){ 
                    if($category.clone().filter('[id="' + selectedLang + '"]').length){
                        $(this).closest('#update_post').find("#category_name").html($category.clone().filter('[id="' + selectedLang + '"]'));
                    }else{
                        $(this).closest('#update_post').find("#category_name").html('<option>Data is Not Found</option>');
                    }
                }else{
                    $(this).closest('#update_post').find("#category_name").html($category);
                }
            });
        });
    });
</script>
@endpush