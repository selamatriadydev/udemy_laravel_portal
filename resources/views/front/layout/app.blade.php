<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

   @include('front.layout.css')
   @include('front.layout.script_header')
</head>

<body>
    <!-- Topbar Start -->
    @include('front.layout.top_nav')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('front.layout.nav')
    <!-- Navbar End -->

    @yield('main_content')

    <!-- Footer Start -->
    @include('front.layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


   @include('front.layout.script_footer')

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