@extends('admin.layout.app')

@section('title', 'Update Page Contact Content') 

@section('heading', 'Update Page Contact Content')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}"> 
@endpush

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Page Contact Content</h3> 
        </div>
        <div class="card-body">
            <div class="btn-group d-flex">
                @foreach ($language_data as $item)
                    @php
                        $btn_class = "btn-outline-secondary";
                        $page_ready = \App\Models\Page::where('language_id', $item->id)->count();
                        if($page_ready){
                            $btn_class = "btn-outline-success";
                        }
                        if($lang_id==$item->id){
                            $btn_class = "btn-success";
                        }
                    @endphp
                    <a href="{{ route('admin_page_contact_lang', $item->id) }}" class="btn {{ $btn_class }}"> <strong>{{ $item->short_name }}</strong> {{ $item->name }}</a>
                @endforeach
            </div>
            <form action="{{ route('admin_page_contact_edit_submit') }}" method="post">
                @csrf
                <input type="hidden" name="lang_id" value="{{ $lang_id }}">
                <div class="form-group">
                    <label for="contact_title">Title *</label>
                    <input type="text" class="form-control @error('contact_title') is-invalid @enderror" id="contact_title" name="contact_title" value="{{ old('contact_title', $contact_title) }}" placeholder="Contact Title">
                </div>
                <div class="form-group">
                    <label for="contact_detail">Detail *</label>
                    <textarea name="contact_detail" class="form-control" id="contact_detail" cols="30" rows="10">{{ old('contact_detail', $contact_detail) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="contact_map">Map (iFrame Code)</label>
                    <textarea name="contact_map" class="form-control  @error('contact_map') is-invalid @enderror" id="contact_map" cols="10" rows="5">{{ old('contact_map', $contact_map) }}</textarea>
                    <span>for setting map <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">Click Here</a> </span>
                </div>
                <div class="form-group">
                    <label for="contact_status">Status</label> <br>
                    <input type="checkbox" name="contact_status"  data-bootstrap-switch data-off-color="danger" value="Show"
                    data-on-color="success" data-on-text="Show" data-off-text="Hide" {{ old('contact_status', $contact_status) == 'Show' ? 'checked' : '' }} >
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@push('scripts') 
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('#contact_detail').summernote();
        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush