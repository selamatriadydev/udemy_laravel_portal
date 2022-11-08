@extends('admin.layout.app')

@section('title', 'Languages')

@section('heading', 'Languages')
@section('heading_nav', 'Languages')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Languages</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_language_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div> 
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Short_name</th>
                        <th>Is Default ?</th>
                        <th>Update Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($language_data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->short_name }}</td>
                            <td><span class="badge bg-{{ $item->is_default =='Yes' ? 'success' : 'danger' }}">{{ $item->is_default }}</span></td>
                            <td>
                                <a class="btn btn-primary btn-sm text-white" href="{{ route('admin_language_edit_detail', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit Detail</a>
                            </td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_language_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                @if ($loop->iteration != 1)
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin_language_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $language_data->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection