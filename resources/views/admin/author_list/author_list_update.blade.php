@extends('admin.layout.app')

@section('title', 'Update Author') 

@section('heading', 'Update Author')
@section('heading_nav', 'Update Author')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Author</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_author_section_list') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_author_section_edit_submit', $author_single->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="author_photo">Preview Photo</label>
                            <div class="image">
                                <img src="{{ $author_single->photo ? asset('upload/profile/'.$author_single->photo) : asset('upload/img/user2-160x160.jpg') }}" style="width:300px;" alt="Author Image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author_photo">Post Photo</label>
                            <input type="file" class="form-control @error('author_photo') is-invalid @enderror" id="author_photo" name="author_photo" value="{{ old('author_photo') }}" placeholder="Post Photo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author_name">Name *</label>
                            <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name', $author_single->name) }}" placeholder="Author Name">
                        </div>
                        <div class="form-group">
                            <label for="author_email">Email *</label>
                            <input type="text" class="form-control @error('author_email') is-invalid @enderror" id="author_email" name="author_email" placeholder="Author Email" value="{{ old('author_email', $author_single->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="author_password">Password</label>
                            <input type="password" class="form-control @error('author_password') is-invalid @enderror" id="author_password" name="author_password" placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <label for="author_password_confirm">Password Confirm</label>
                            <input type="password" class="form-control @error('author_password_confirm') is-invalid @enderror" id="author_password_confirm" name="author_password_confirm" placeholder="Password Confirm">
                        </div>
            
                        <div class="form-group">
                            <label for="author_status">Status</label> <br>
                            <input type="checkbox" name="author_status"  data-bootstrap-switch data-off-color="danger" value="Active"
                            data-on-color="success" data-on-text="Active" data-off-text="Pending" {{ old('author_status', $author_single->status) == 'Active' ? 'checked' : '' }} >
                        </div>
                    </div>
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