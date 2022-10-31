@extends('admin.layout.app')

@section('title', 'Update Live Channel') 

@section('heading', 'Update Live Channel')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Live Channel</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_live_channel') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_live_channel_edit_submit', $channel_single->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="videos_show"> Existing Video</label><br>
                    <iframe  style="width: 500px;height:250px" src="https://www.youtube.com/embed/{{ $channel_single->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="form-group">
                    <label for="heading">heading *</label>
                    <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading', $channel_single->heading) }}" placeholder="Heading">
                </div>
                <div class="form-group">
                    <label for="video_id">Video ID *</label>
                    <input type="text" class="form-control @error('video_id') is-invalid @enderror" id="video_id" name="video_id" value="{{ old('video_id', $channel_single->video_id) }}" placeholder="Vedio ID">
                    <span>Tips got <strong>Video Id</strong> from youtube : link <i>https://www.youtube.com/watch?v=</i><strong>ulOb9gIGGd0</strong>, and copy paste video id <strong>ulOb9gIGGd0</strong> </span>
                </div>
    
                <div class="form-group">
                    <label for="status">Status ?</label> <br>
                    <input type="checkbox" name="status"  data-bootstrap-switch data-off-color="danger" value="1"
                    data-on-color="success" data-on-text="Active" data-off-text="NonActive" {{ old('status', $channel_single->status) == 'Active' ? 'checked' : '' }} >
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