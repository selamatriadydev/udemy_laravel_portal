@extends('admin.layout.app')

@section('title', 'Social Items')

@section('heading', 'Social Items')
@section('heading_nav', 'Social Items')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Social Items</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_social_item_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Preview</th>
                        <th>Icon</th>
                        <th>Url</th>
                        <th>Status?</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($social_items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ $item->url }}" class="badge badge-primary" target="_blank"><i class="{{ $item->icon }}" style="font-size: 30px"></i></a></td>
                            <td> {{ $item->icon }} </td>
                            <td> {{ $item->url }}</td>
                            <td><span class="badge bg-{{ $item->status =='Show' ? 'success' : 'danger' }}">{{ $item->status }}</span></td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_social_item_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_social_item_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $social_items->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection