@extends('admin.layout.app')

@section('title', 'Online Poll')

@section('heading', 'Online Poll')
@section('heading_nav', 'Online Poll')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Online Poll</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_online_poll_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Yes Vote</th>
                        <th>No Vote</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($online_polls as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->question }}</td>
                            <td><span class="badge bg-success">{{ $item->yes_vote }}</span></td>
                            <td><span class="badge bg-danger">{{ $item->no_vote }}</span></td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_online_poll_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_online_poll_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $online_polls->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection