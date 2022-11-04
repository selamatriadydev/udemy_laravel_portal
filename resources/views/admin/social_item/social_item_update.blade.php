@extends('admin.layout.app')

@section('title', 'Update Social Item') 

@section('heading', 'Update Social Item')
@section('heading_nav', 'Update Social Item')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Social Item</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_social_item') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_social_item_edit_submit', $social_item_single->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="social_item_icon">Icon Preview</label>
                    <div>
                        <i class="{{ $social_item_single->icon }}" style="font-size: 30px"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="social_item_icon">Icon *</label>
                    <input type="text" class="form-control @error('social_item_icon') is-invalid @enderror" id="social_item_icon" name="social_item_icon" value="{{ old('social_item_icon', $social_item_single->icon) }}" placeholder="Icon">
                </div>
                <div class="form-group">
                    <label for="social_item_url">Url *</label>
                    <input type="text" class="form-control @error('social_item_url') is-invalid @enderror" id="social_item_url" name="social_item_url" placeholder="URL" value="{{ old('social_item_url', $social_item_single->url) }}">
                </div>
    
                <div class="form-group">
                    <label for="social_item_status">Status ?</label> <br>
                    <input type="checkbox" name="social_item_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('social_item_status', $social_item_single->status) == 'Show' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
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