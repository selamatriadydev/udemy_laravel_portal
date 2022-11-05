     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  
 
     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
 
     <!-- Libraries Stylesheet -->
     <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
     {{-- <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"> --}}

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
     <!-- Toastr -->
     <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
     <style>
          div.post-short-text {
               display: -webkit-box;
               -webkit-line-clamp:4;
               -webkit-box-orient: vertical;
               overflow: hidden;
          }
     </style>
     @stack('style')