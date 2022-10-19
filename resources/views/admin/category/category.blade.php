@extends('admin.layout.app')

@section('title', 'Category')

@section('heading', 'Category')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Category</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_category_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Show On Menu</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->category_name }}
                            </td>
                            <td><span class="badge bg-{{ $item->show_on_menu =='Show' ? 'success' : 'danger' }}">{{ $item->show_on_menu }}</span></td>
                            <td>{{ $item->category_order }}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_category_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_category_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $category->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection