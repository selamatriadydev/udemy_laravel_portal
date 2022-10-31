@extends('admin.layout.app')

@section('title', 'Live Channel')

@section('heading', 'Live Channel')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Live Channel</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_live_channel_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Heading</th>
                        <th>Video</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($live_channels as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->heading }}</td>
                            <td>
                                <iframe  style="width: 200px;heigth:150" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </td>
                            <td><span class="badge bg-{{ $item->status =='Active' ? 'success' : 'danger' }}">{{ $item->status }}</span></td>
                            <td>
                                @php
                                $updated_date = "";
                                if($item->updated_at){
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date('d F, Y', $ts);
                                }
                                @endphp
                                {{ $updated_date }}
                            </td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_live_channel_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_live_channel_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $live_channels->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection