@extends('admin.layout.app')

@section('title', 'Photo Galery')

@section('heading', 'Photo Galery')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Photo Galery</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_video_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>video</th>
                        <th>Caption</th>
                        <th>Is Publish</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($video_show as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $item->video_id }}</td> --}}
                            <td> 
                                <iframe  style="width: 200px;heigth:150" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{-- <img class="img-fluid" style="width: 200px" src="{{ 'https://www.img.youtube.com/vi/'.$item->video_id.'/0.jpg'}}" alt="Photo" >  --}}
                            </td>
                            <td>{{ $item->caption }}</td>
                            <td><span class="badge bg-{{ $item->is_publish =='1' ? 'success' : 'danger' }}">{{ $item->is_publish == 1 ? 'Publish' : 'Daft' }}</span></td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_video_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_video_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $video_show->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection