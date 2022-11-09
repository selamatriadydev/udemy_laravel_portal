@extends('admin.layout.app')

@section('title', 'Photo Galery')

@section('heading', 'Photo Galery')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Photo Galery</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_photo_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Caption</th>
                        <th>Is Publish</th>
                        <th>Language</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photo as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> <img class="img-fluid" style="width: 200px" src="{{ asset('upload/galery/photo/'.$item->photo)}}" alt="Photo" > </td>
                            <td>{{ $item->caption }}</td>
                            <td><span class="badge bg-{{ $item->is_publish =='1' ? 'success' : 'danger' }}">{{ $item->is_publish == 1 ? 'Publish' : 'Daft' }}</span></td>
                            <td>{{ $item->rLanguage ? $item->rLanguage->name : '' }}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_photo_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_photo_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $photo->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection