@extends('admin.layout.app')

@section('title', 'New Video Galery') 

@section('heading', 'New Video Galery')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Video Galery</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_video') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_video_add_submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_order">Language *</label>
                    <select name="language" id="language" class="form-control @error('language') is-invalid @enderror">
                        <option value="">Select Language</option>
                        @foreach ($language_data as $item)
                        <option value="{{ $item->id }}" {{ old('language') == $item->id ? 'selected' : '' }}>{{ $item->short_name }}-{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="video_id">Video ID *</label>
                    <input type="text" class="form-control @error('video_id') is-invalid @enderror" id="video_id" name="video_id" value="{{ old('video_id') }}" placeholder="Vedio ID">
                    <span>Tips got <strong>Video Id</strong> from youtube : link <i>https://www.youtube.com/watch?v=</i><strong>ulOb9gIGGd0</strong>, and copy paste video id <strong>ulOb9gIGGd0</strong> </span>
                </div>
                <div class="form-group">
                    <label for="caption">Caption *</label>
                    <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" value="{{ old('caption') }}" placeholder="Caption">
                </div>
    
                <div class="form-group">
                    <label for="is_publish">Is Publish ?</label> <br>
                    <input type="checkbox" name="is_publish"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="Publish" data-off-text="Draft" {{ old('is_publish') == '1' ? 'checked' : '' }} >
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