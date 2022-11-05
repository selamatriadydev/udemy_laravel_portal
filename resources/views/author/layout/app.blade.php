<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
{{-- style  --}}
    @include('author.layout.css')
    @include('author.layout.script_header')
</head>
@if (Auth::guard('author')->user())
    <body class="hold-transition sidebar-mini layout-fixed">
@else
    <body class="hold-transition login-page">
@endif

@if (Auth::guard('author')->user())
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader transparent flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('upload/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('author.layout.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
        @include('author.layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('heading')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('author_home') }}">Home</a></li>
                <li class="breadcrumb-item active">@yield('heading_nav', 'Show Page')</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @yield('main_content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@else
    @yield('main_content')
@endif
{{-- script  --}}
@include('author.layout.script_footer')
@if(isset($errors) && $errors->any())
    @foreach ($errors->all() as $error)
        <script> toastr.error('{{ $error }}') </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script> toastr.error('{{ session()->get('error') }}') </script>
@endif

@if(session()->get('success'))
    <script> toastr.success('{{ session()->get('success') }}') </script>
@endif

@if(session()->get('warning'))
    <script> toastr.warning('{{ session()->get('warning') }}') </script>
@endif
</body>
</html>
