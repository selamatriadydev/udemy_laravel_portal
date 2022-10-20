@extends('admin.layout.app')

@section('title', 'Sub Category')

@section('heading', 'Sub Category')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sub Category</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_sub_category_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th> 
                        <th>Name</th>
                        <th>Category</th>
                        <th>Show On Menu</th>
                        <th>Show On Home</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->sub_category_name }}
                            </td>
                            <td>{{ $item->rCategory ? $item->rCategory->category_name : ''}}</td>
                            <td><span class="badge bg-{{ $item->show_on_menu =='Show' ? 'success' : 'danger' }}">{{ $item->show_on_menu }}</span></td>
                            <td><span class="badge bg-{{ $item->show_on_home =='Show' ? 'success' : 'danger' }}">{{ $item->show_on_home }}</span></td>
                            <td>{{ $item->sub_category_order }}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_sub_category_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_sub_category_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $sub_category->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection