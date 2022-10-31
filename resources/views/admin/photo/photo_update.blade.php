@extends('admin.layout.app')

@section('title', 'Update Photo Galery') 

@section('heading', 'Update Photo Galery')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Photo Galery</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_photo') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_photo_edit_submit', $photo_single->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photos_show"> Existing Post Photo</label><br>
                    <img class="img-fluid" id="photos_show" style="width: 300px" src="{{ asset('upload/galery/photo/'.$photo_single->photo)}}" alt="Photo" >
                </div>
                <div class="form-group">
                    <label for="photo">Photo *</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="caption">Caption *</label>
                    <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" value="{{ old('caption', $photo_single->caption) }}" placeholder="Caption">
                </div>
    
                <div class="form-group">
                    <label for="is_publish">Is Publish ?</label> <br>
                    <input type="checkbox" name="is_publish"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="Publish" data-off-text="Draft" {{ old('is_publish', $photo_single->is_publish) == '1' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
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
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush