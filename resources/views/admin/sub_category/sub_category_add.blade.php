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
            <form action="{{ route('admin_sub_category_add_submit') }}" method="post" id="new_sub_category">
                @csrf
                <div class="form-group">
                    <label for="category_order">Language *</label>
                    <select name="language" id="language" class="form-control language @error('language') is-invalid @enderror">
                        @foreach ($language_data as $item)
                        <option value="{{ $item->id }}" {{ old('language') == $item->id ? 'selected' : '' }}>{{ $item->short_name }}-{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id"> Category Name *</label>
                    <select name="category_id" id="category_id" class="form-control category_value @error('category_id') is-invalid @enderror">
                        @foreach ($language_data as $item)
                            <optgroup id="{{ $item->id }}" label="Language {{ $item->name }}">
                                @foreach ($item->rCategory as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                @endforeach
                            </optgroup>
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
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('sub_category_on_menu') == 'Show' ? 'checked' : '' }} >
                </div>
                <div class="form-group">
                    <label for="sub_category_on_home">Sub Category Show on Home</label> <br>
                    <input type="checkbox" name="sub_category_on_home"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('sub_category_on_home') == 'Show' ? 'checked' : '' }} >
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
        $(document).ready( function(){
            var $category = $(".category_value > optgroup").clone();
            var postSelected = $('#language').val();
            if(postSelected){
                if($category.clone().filter('[id="' + postSelected + '"]').length){
                    $('#new_sub_category').find(".category_value").html($category.clone().filter('[id="' + postSelected + '"]'));
                }else{
                    $('#new_sub_category').find(".category_value").html('<option>Select Language</option>');
                }
            }
            $('#language').on("change", function() {
                var selectedLang = $(this).val();
                // alert(selectedLang)
                if(selectedLang){ 
                    // console.log( $category.clone().filter('[id="' + selectedLang + '"]')[0].childElementCount );
                    if($category.clone().filter('[id="' + selectedLang + '"]').length){
                        if( $category.clone().filter('[id="' + selectedLang + '"]')[0].childElementCount ){
                            $(this).closest('#new_sub_category').find(".category_value").html($category.clone().filter('[id="' + selectedLang + '"]'));
                        }else{
                            $(this).closest('#new_sub_category').find(".category_value").html('<option>Data is Not Found</option>');
                        }
                    }else{
                        $(this).closest('#new_sub_category').find(".category_value").html('<option>Data is Not Found</option>');
                    }
                }else{
                    $(this).closest('#new_sub_category').find(".category_value").html($category);
                }
            });
        });
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush