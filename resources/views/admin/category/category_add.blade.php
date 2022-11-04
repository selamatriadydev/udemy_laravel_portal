@extends('admin.layout.app')

@section('title', 'New Category') 

@section('heading', 'New Category')
@section('heading_nav', 'New Category')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Category</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_category') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_category_add_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name *</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ old('category_name') }}" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="category_order">Category Order *</label>
                    <input type="text" class="form-control @error('category_order') is-invalid @enderror" id="category_order" name="category_order" placeholder="Category Order" value="{{ old('category_order') }}">
                </div>
    
                <div class="form-group">
                    <label for="category_on_menu">Category Show on Menu</label> <br>
                    <input type="checkbox" name="category_on_menu"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('category_on_menu') == 'Show' ? 'checked' : '' }} >
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