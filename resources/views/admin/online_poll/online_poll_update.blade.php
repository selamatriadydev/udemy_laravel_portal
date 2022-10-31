@extends('admin.layout.app')

@section('title', 'Update Online Poll') 

@section('heading', 'Update Online Poll')
@section('heading_nav', 'Update Online Poll')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Online Poll</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_online_poll_show') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_online_poll_edit_submit', $question_single->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="question">Question *</label>
                    <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question" cols="30" rows="5">{{ old('question', $question_single->question) }}</textarea>
                    @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection