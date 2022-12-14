@extends('admin.layout.app')

@section('title', 'New Online Poll') 

@section('heading', 'New Online Poll')
@section('heading_nav', 'New Online Poll')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Online Poll</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_online_poll_show') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div> 
        <div class="card-body">
            <form action="{{ route('admin_online_poll_add_submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_order">Language *</label>
                    <select name="language" id="language" class="form-control @error('language') is-invalid @enderror">
                        <option value="">Select Language</option>
                        @foreach ($language_data as $item)
                        <option value="{{ $item->id }}" {{ old('language') == $item->id ? 'selected' : '' }}>{{ $item->short_name }}-{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Question *</label>
                    <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question" cols="30" rows="5">{{ old('question') }}</textarea>
                    @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection