
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Advertisement</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('admin_ad') }}" class="nav-link {{ Route::currentRouteName() == 'admin_ad' ? 'disabled' : '' }}" style="{{ Route::currentRouteName() == 'admin_ad' ? 'color: blue;' : '' }}" >
                <i class="far fa-file-alt"></i> All
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin_home_ad_header') }}" class="nav-link {{ Route::currentRouteName() == 'admin_home_ad_header' ? 'disabled' : '' }}" style="{{ Route::currentRouteName() == 'admin_home_ad_header' ? 'color: blue;' : '' }}" >
                <i class="far fa-file-alt"></i> Posisi Top Navigasi
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('admin_home_ad') }}" class="nav-link {{ Route::currentRouteName() == 'admin_home_ad' ? 'disabled' : '' }}" style="{{ Route::currentRouteName() == 'admin_home_ad' ? 'color: blue;' : '' }}" >
                    <i class="far fa-file-alt"></i> Posisi Top Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin_home_ad_bottom') }}" class="nav-link {{ Route::currentRouteName() == 'admin_home_ad_bottom' ? 'disabled' : '' }}" style="{{ Route::currentRouteName() == 'admin_home_ad_bottom' ? 'color: blue;' : '' }}" >
                <i class="far fa-file-alt"></i> Posisi Bottom Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin_home_ad_sidebar') }}" class="nav-link {{ Route::currentRouteName() == 'admin_home_ad_sidebar' ? 'disabled' : '' }}" style="{{ Route::currentRouteName() == 'admin_home_ad_sidebar' ? 'color: blue;' : '' }}" >
                <i class="far fa-file-alt"></i> Posisi Sidebar
                </a>
            </li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->