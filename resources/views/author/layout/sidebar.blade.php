<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('author_home') }}" class="brand-link">
      <img src="{{ asset('upload/img/AdminLTELogo.png') }}" alt="AuthorPanel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AuthorPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::guard('author')->user()->photo ? asset('upload/profile/'.Auth::guard('author')->user()->photo) : asset('upload/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('author')->user()->name }}</a>
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
            <a href="{{ route('author_home') }}" class="nav-link {{ Route::currentRouteName() =='author_home' ? 'active' :'' }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-header">News</li>
          <li class="nav-item {{ Request::is('author/post/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{ Request::is('author/post/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Posts
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('author_post_add') }}" class="nav-link {{ Route::currentRouteName() =='author_post_add' ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('author_post') }}" class="nav-link {{ Request::is('author/post/*') ? 'active' :'' }}">
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