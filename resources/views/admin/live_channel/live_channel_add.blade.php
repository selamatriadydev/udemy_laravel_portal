@extends('admin.layout.app')

@section('title', 'New Live Channel') 

@section('heading', 'New Live Channel')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Live Channel</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_live_channel') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_live_channel_add_submit') }}" method="post" enctype="multipart/form-data">
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
                    <label for="heading">heading *</label>
                    <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading') }}" placeholder="Heading">
                </div>
                <div class="form-group">
                    <label for="video_id">Video ID *</label>
                    <input type="text" class="form-control @error('video_id') is-invalid @enderror" id="video_id" name="video_id" value="{{ old('video_id') }}" placeholder="Vedio ID">
                    <span>Tips got <strong>Video Id</strong> from youtube : link <i>https://www.youtube.com/watch?v=</i><strong>ulOb9gIGGd0</strong>, and copy paste video id <strong>ulOb9gIGGd0</strong> </span>
                </div>
    
                <div class="form-group">
                    <label for="status">Status ?</label> <br>
                    <input type="checkbox" name="status"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="Active" data-off-text="NonActive" {{ old('status') == 'Active' ? 'checked' : '' }} >
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