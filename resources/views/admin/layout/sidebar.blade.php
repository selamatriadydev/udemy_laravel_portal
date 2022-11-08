<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin_home') }}" class="brand-link">
      <img src="{{ asset('upload/img/AdminLTELogo.png') }}" alt="AdminPanel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::guard('admin')->user()->photo ? asset('upload/profile/'.Auth::guard('admin')->user()->photo) : asset('upload/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->

          <li class="nav-header">Home</li>
          <li class="nav-item">
            <a href="{{ route('admin_home') }}" class="nav-link {{ Route::currentRouteName() =='admin_home' ? 'active' :'' }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-header">News</li>
          <li class="nav-item">
            <a href="{{ route('admin_author_section_list') }}" class="nav-link {{ Request::is('admin/author/*') ? 'active' :'' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Author List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_ad') }}" class="nav-link {{ Request::is('admin/advertisement') || Request::is('admin/advertisement/*') ? 'active' :'' }}">
              <i class="nav-icon fa fa-ad"></i>
              <p>
                Advertisement
              </p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('admin/faq/*') || Request::is('admin/sosial-item/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/faq/*') || Request::is('admin/sosial-item/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Params 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin_faq') }}" class="nav-link {{ Request::is('admin/faq/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_social_item') }}" class="nav-link {{ Request::is('admin/social-item/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_language') }}" class="nav-link {{ Request::is('admin/language/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Multi Language</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/post/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/post/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Posts
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="{{ route('admin_category') }}" class="nav-link {{ Request::is('admin/post/category/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_sub_category') }}" class="nav-link {{ Request::is('admin/post/sub-category/*')? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_post') }}" class="nav-link {{ Request::is('admin/post/list/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Post</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/galery/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/galery/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Galery
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin_photo') }}" class="nav-link {{ Request::is('admin/galery/photo/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Photo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_video') }}" class="nav-link {{ Request::is('admin/galery/video/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_setting_front') }}" class="nav-link {{ Route::currentRouteName() =='admin_setting_front' ? 'active' :'' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Front Setting 
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/page/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/page/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin_page_about') }}" class="nav-link {{ Request::is('admin/page/about/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_faq') }}" class="nav-link {{ Request::is('admin/page/faq/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faq</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_contact') }}" class="nav-link {{ Request::is('admin/page/contact/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_login') }}" class="nav-link {{ Request::is('admin/page/login/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_terms') }}" class="nav-link {{ Request::is('admin/page/terms/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terms & Conditions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_privacy') }}" class="nav-link {{ Request::is('admin/page/privacy/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_page_disclaimer') }}" class="nav-link {{ Request::is('admin/page/disclaimer/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disclaimer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/subscribers/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/subscribers/*') ? 'active' :'' }}">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Subscribers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin_subscriber') }}" class="nav-link {{ Request::is('admin/subscribers/all') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subscribers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_subscriber_send_email') }}" class="nav-link {{ Request::is('admin/subscribers/send-email') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Email to all</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/live-channel/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('admin/live-channel/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Live Channels
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin_live_channel_add') }}" class="nav-link {{ Request::is('admin/live-channel/add') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Live Channels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_live_channel_active') }}" class="nav-link {{ Request::is('admin/live-channel/active-show') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Live Channels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin_live_channel') }}" class="nav-link {{ Request::is('admin/live-channel/*') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Live Channels</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_online_poll_show') }}" class="nav-link {{ Request::is('admin/online-poll/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Online Poll
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>