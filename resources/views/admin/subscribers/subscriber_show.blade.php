@extends('admin.layout.app')

@section('title', 'All Subscribers')

@section('heading', 'All Subscribers')

@section('heading_nav', 'All Subscribers')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">All Subscribers</h3> 
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriber_data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->email }}</td>
                            <td><span class="badge bg-{{ $item->status =='Active' ? 'success' : 'danger' }}">{{ $item->status }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $subscriber_data->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection