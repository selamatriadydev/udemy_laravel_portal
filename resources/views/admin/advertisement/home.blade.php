@extends('admin.layout.app')

@section('title', 'Advertisement')

@section('heading', 'Home Advertisement')

@section('main_content')
<!-- Default box -->
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        {{-- posisi  --}}
        <div class="col-md-3">
            @include('admin.advertisement.list_posisi')
        </div>
        {{-- content  --}}
        {{-- right column  --}}
        <div class="col-md-9">
            @switch( Route::currentRouteName() )
                @case('admin_home_ad')
                        @include('admin.advertisement.content.top_home')
                    @break
                @case('admin_home_ad_bottom')
                    @include('admin.advertisement.content.bottom_home')
                    @break
                @case('admin_home_ad_header')
                    @include('admin.advertisement.content.header')
                    @break
                @case('admin_home_ad_sidebar')
                    @include('admin.advertisement.content.sidebar')
                    @break
                @default
                    @include('admin.advertisement.content.all')
            @endswitch
        </div>
    </div>
</div>
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

