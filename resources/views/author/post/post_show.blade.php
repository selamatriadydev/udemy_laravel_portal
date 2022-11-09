@extends('author.layout.app')

@section('title', 'Posts')

@section('heading', 'Posts')
@section('heading_nav', 'Posts')

@section('main_content')
    <div class="card card-primary">
        <div class="card-body">
            <form action="{{ route('author_post_search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                    <select name="key_search" id="key_search" class="form-control">
                        @foreach ($filter_list as $key=>$item)
                            <option value="{{ $key }}" {{ old('key_search') == $key ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-6">
                    <input type="text" name="val_search" class="form-control" placeholder="Title or Category or Sub Category or Author or Status">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i></button>
                        <a href="{{ route('author_post') }}" class="btn btn-danger" >Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
      <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Posts</h3> 
            <div class="card-tools">
                <a href="{{ route('author_post_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Visitor</th>
                        <th>Status?</th>
                        <th>Language</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> <img class="img-fluid" style="width: 200px" src="{{ asset('upload/post/'.$item->post_photo)}}" alt="Photo" > </td>
                            <td>{{ $item->post_title }}</td>
                            <td>
                                @if ($item->rSubCategory)
                                    @if ($item->rSubCategory->rCategory)
                                        {{ $item->rSubCategory->rCategory->category_name  }}
                                    @endif
                                @endif
                            </td>
                            <td>{{ $item->rSubCategory ? $item->rSubCategory->sub_category_name : '' }}</td>
                            <td>{{ $item->visitor }}</td>
                            <td> <span class="badge badge-{{ $item->is_publish == 1 ? 'success' : 'danger' }}"> {{ $item->is_publish == 1 ? 'Publish' : 'Draft' }}</span> </td>
                            <td>{{ $item->rLanguage ? $item->rLanguage->name : '' }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('news_detail', $item->id) }}" target="_blank"><i class="fas fa-eye"></i> Show</a>
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('author_post_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('author_post_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $posts->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection