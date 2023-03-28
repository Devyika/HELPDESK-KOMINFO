<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('image/logo.png') }}" style="width: 100%; height: 80px;" >
      
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="nav-icon far fa-user">SuperAdmin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Kelola Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('superadmins.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Data SuperAdmin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admins.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('opds.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Data OPD</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">DATA MONITORING</li>
          <li class="nav-item">
            <a href="{{ route('pendaftarans.index') }}" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Website OPD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Traffic
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Server Control
              </p>
            </a>
          </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>