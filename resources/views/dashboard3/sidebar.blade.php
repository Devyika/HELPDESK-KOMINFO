<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="{{ asset('image/logoweb.png') }}" style="width: 50%; height: 50%; margin-left: 50px" >
            </a>
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-home mb-2 mt-2 p-2"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="#"></i>
              <p>
                Layanan 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('pendaftarans.create') }}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Pengajuan Website</p>
                </a>
              </li>
            </ul>
          </li>
          
       
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>