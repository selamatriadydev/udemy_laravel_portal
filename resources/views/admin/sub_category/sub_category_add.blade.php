@extends('admin.layout.app')

@section('title', 'New Sub Category') 

@section('heading', 'New Sub Category')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Sub Category</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_sub_category') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_sub_category_add_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_id"> Category Name *</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category_name">Sub Category Name *</label>
                    <input type="text" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name" name="sub_category_name" value="{{ old('sub_category_name') }}" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="sub_category_order">Sub Category Order *</label>
                    <input type="text" class="form-control @error('sub_category_order') is-invalid @enderror" id="sub_category_order" name="sub_category_order" placeholder="Category Order" value="{{ old('sub_category_order') }}">
                </div>
    
                <div class="form-group">
                    <label for="sub_category_on_menu">Sub Category Show on Menu</label> <br>
                    <input type="checkbox" name="sub_category_on_menu"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('sub_category_on_menu') == 'Show' ? 'checked' : 'checked' }} >
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