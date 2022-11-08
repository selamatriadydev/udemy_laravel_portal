@extends('admin.layout.app')

@section('title', 'Update Language') 

@section('heading', 'Update Language')
@section('heading_nav', 'Update Language')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Language</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_language') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_language_edit_submit', $language_single->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="language_name">Name *</label>
                    <input type="text" class="form-control @error('language_name') is-invalid @enderror" id="language_name" name="language_name" value="{{ old('language_name', $language_single->name) }}" placeholder="Language name">
                </div>
                <div class="form-group">
                    <label for="language_short_name">Short Name *</label>
                    <input type="text" class="form-control @error('language_short_name') is-invalid @enderror" id="language_short_name" name="language_short_name"  value="{{ old('language_short_name', $language_single->short_name) }}" placeholder="Language short name">
                    <span>Referency code <a href="https://www.w3schools.com/tags/ref_language_codes.asp" class="badge badge-primary" target="_blank" rel="noopener noreferrer">Click Here</a></span>
                </div>
    
                <div class="form-group">
                    <label for="language_default">Is Default ?</label> <br>
                    <input type="checkbox" name="language_default"  data-bootstrap-switch data-off-color="danger" value="Yes"
                    data-on-color="success" data-on-text="YES" data-off-text="NO" {{ old('language_default', $language_single->is_default) == 'Yes' ? 'checked' : '' }} >
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