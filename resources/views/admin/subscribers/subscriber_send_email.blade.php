@extends('admin.layout.app')

@section('title', 'Send Email to all Subscribers') 

@section('heading', 'Send Email to all Subscribers')


@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Send Email to all Subscribers</h3> 
        </div>
        <div class="card-body">
            <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email_subject">Email Subject *</label>
                    <input type="text" class="form-control @error('email_subject') is-invalid @enderror" id="email_subject" name="email_subject" value="{{ old('email_subject') }}" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="email_message">Email Message *</label>
                    <textarea name="email_message" id="email_message" class="form-control @error('email_message') is-invalid @enderror" cols="30" rows="10"> {{ old('email_message') }}</textarea>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope" aria-hidden="true"></i> Send Email</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@push('scripts') 
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('#email_message').summernote();
    });
</script>
@endpush