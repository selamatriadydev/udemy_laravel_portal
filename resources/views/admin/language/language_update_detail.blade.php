@extends('admin.layout.app')

@section('title', 'Update Detail Language') 

@section('heading', 'Update Detail Language')
@section('heading_nav', 'Update Detail Language')

@section('main_content')
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Detail Language</h3> 
            <div class="card-tools">
                <a href="{{ route('admin_language') }}" class="btn btn-warning" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="language_name">Name </label>
                    <div>{{ $language_single->name }}</div>
                </div>
                <div class="col-md-4">
                    <label for="language_short_name">Short Name </label>
                    <div>{{ $language_single->short_name }}</div>
                </div>
                <div class="col-md-4">
                    <label for="language_short_name">Is Default ? </label>
                    <div><span class="badge bg-{{ $language_single->is_default =='Yes' ? 'success' : 'danger' }}">{{ $language_single->is_default }}</span></div>
                </div>
            </div>
            <form action="{{ route('admin_language_edit_detail_submit', $language_single->id) }}" method="post">
                @csrf
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th style="width: 40px">#</th>
                            <th style="width: 30%;">Key</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lang_json_data as $key=>$value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $key }}
                                </td>
                                <td>
                                    <input type="hidden" id="arr_key" name="arr_key[]" value="{{ $key }}" style="text-transform: uppercase;">
                                    <input type="text" id="arr_value" name="arr_value[]" class="form-control" value="{{ $value }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@push('scripts') 
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
@endpush