@extends('admin.layout.app')

@section('title', 'New Social Item') 

@section('heading', 'New Social Item')
@section('heading_nav', 'New Social Item')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Social Item</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_social_item') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_social_item_add_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="social_item_icon">Icon *</label>
                    <input type="text" class="form-control @error('social_item_icon') is-invalid @enderror" id="social_item_icon" name="social_item_icon" value="{{ old('social_item_icon') }}" placeholder="Icon">
                </div>
                <div class="form-group">
                    <label for="social_item_url">Url *</label>
                    <input type="text" class="form-control @error('social_item_url') is-invalid @enderror" id="social_item_url" name="social_item_url" placeholder="URL" value="{{ old('social_item_url') }}">
                </div>
    
                <div class="form-group">
                    <label for="social_item_status">Status ?</label> <br>
                    <input type="checkbox" name="social_item_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('social_item_status') == 'Show' ? 'checked' : '' }} >
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