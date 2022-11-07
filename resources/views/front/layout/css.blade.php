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
     @php
          if($global_setting_data && $global_setting_data->theme_color_1 !="")
     @endphp
     <style>
          .popular_recent a.nav-link {
               color: black;
          }
          .contact, .about  {
               color: white !important;
          }
          .bg-dark, .navbar-dark, 
          .popular_recent a.nav-link, 
          .list-group-item,
          .badge-primary, 
          .btn-primary, 
          .social-item a,
          .dropdown-item:hover,.dropdown-item:focus,.navbar-dark .navbar-nav .nav-link:hover,
          .news_letter .btn {
               background: {{ $global_setting_data && $global_setting_data->theme_color_1 !="" ? $global_setting_data->theme_color_1 : '#1E2024' }} !important;
          }
          .navbar-expand-sm  li, 
          .list-group-item,
          .btn-primary, .social-item a {
               border-color: {{ $global_setting_data && $global_setting_data->theme_color_1 !="" ? $global_setting_data->theme_color_1 : '#1E2024' }} !important;
          }

          .section-title {
               border-left: 5px solid {{ $global_setting_data && $global_setting_data->theme_color_1 !="" ? $global_setting_data->theme_color_1 : '#FFCC00' }} !important;;
          }
          .social-item a:hover,
          .forget_password {
               color: {{ $global_setting_data && $global_setting_data->theme_color_1 !="" ? $global_setting_data->theme_color_1 : '#FFCC00' }} !important;;
          }

          .bg-primary, 
          .navbar-dark .navbar-nav .nav-link.active, 
          .popular_recent a.nav-link:hover, 
          .popular_recent a.nav-link.active,
          .btn-outline-secondary:hover, 
          .btn-primary:hover, 
          a.badge-primary:hover, a.badge-primary:focus, 
          .social-item a:hover, 
          .news-carousel .owl-nav .owl-prev:hover, .news-carousel .owl-nav .owl-next:hover,
          .list-group-item.active,
          .btn-light:hover,
          .news_letter .btn:hover {
               background: {{ $global_setting_data && $global_setting_data->theme_color_2 !="" ? $global_setting_data->theme_color_2 : '#FFCC00' }} !important;;
          }
          .footer-app a,
          .useful_link .nav-link:hover, .useful_link .nav-link:focus,
          a.text-secondary:hover, a.text-secondary:focus, .forget_password:hover {
               color: {{ $global_setting_data && $global_setting_data->theme_color_2 !="" ? $global_setting_data->theme_color_2 : '#FFCC00' }} !important;;
          }

          a.post-title-short-text {
               display: -webkit-box;
               -webkit-line-clamp:1;
               -webkit-box-orient: vertical;
               overflow: hidden;
          }
          div.post-short-text {
               display: -webkit-box;
               -webkit-line-clamp:4;
               -webkit-box-orient: vertical;
               overflow: hidden;
          }
          div.footer-about-short-text {
               display: -webkit-box;
               -webkit-line-clamp:9;
               -webkit-box-orient: vertical;
               overflow: hidden;
          }
     </style>
     @stack('style')