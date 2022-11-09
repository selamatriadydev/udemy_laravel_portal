@extends('admin.layout.app')

@section('title', 'FAQ')

@section('heading', 'FAQ')
@section('heading_nav', 'Show FAQ')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">FAQ</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_faq_add') }}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Status?</th>
                        <th>Language</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->faq_title }} </td>
                            <td>{!! $item->faq_detail !!} </td>
                            <td><span class="badge bg-{{ $item->faq_status =='Show' ? 'success' : 'danger' }}">{{ $item->faq_status }}</span></td>
                            <td>{{ $item->rLanguage ? $item->rLanguage->name : '' }}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> View</a> --}}
                                <a class="btn btn-warning btn-sm text-white" href="{{ route('admin_faq_edit', $item->id) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin_faq_delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {!! $faqs->links('vendor.pagination.bootstrap-4') !!}
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection