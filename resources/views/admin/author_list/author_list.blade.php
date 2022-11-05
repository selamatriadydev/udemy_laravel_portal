@extends('admin.layout.app')

@section('title', 'Authors')

@section('heading', 'Authors')

@section('heading_nav', 'Authors')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Authors</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_author_section_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status?</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authot_lists as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->photo)
                                    <div class="image">
                                        <img src="{{ $item->photo ? asset('upload/profile/'.$item->photo) : asset('upload/img/user2-160x160.jpg') }}" class=" elevation-2" style="width:60px;" alt="Author Image">
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><span class="badge bg-{{ $item->status =='Active' ? 'success' : 'danger' }}">{{ $item->status }}</span></td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_author_section_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_author_section_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $authot_lists->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection