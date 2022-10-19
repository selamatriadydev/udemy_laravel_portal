@extends('admin.layout.app')

@section('title', 'Posts')

@section('heading', 'Posts')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Posts</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_post_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
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
                        <th>Author</th>
                        <th>Admin</th>
                        <th>Status</th>
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
                            <td>
                                @if ($item->rAuthor)
                                    @if ($item->rAuthor->photo)
                                        <img src="{{ asset('upload/profile/'.$item->rAuthor->photo) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    @endif
                                    {{ $item->rAdmin->name }}
                                @endif
                            </td>
                            <td>
                                @if ($item->rAdmin)
                                    @if ($item->rAdmin->photo)
                                        <img src="{{ asset('upload/profile/'.$item->rAdmin->photo) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    @endif
                                    {{ $item->rAdmin->name }}
                                @endif
                            </td>
                            <td> <span class="badge badge-{{ $item->is_publish == 1 ? 'success' : 'danger' }}"> {{ $item->is_publish == 1 ? 'Publish' : 'Draft' }}</span> </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> Show</a>
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_post_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_post_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
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