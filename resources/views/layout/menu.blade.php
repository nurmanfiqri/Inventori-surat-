<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url ('/dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Dashboard</p>
        </a>
      </li>
      @if (auth()->user()->level=="admin")
      <li class="nav-item">
        <a href="{{url ('/user')}}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>User</p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{url ('/role')}}" class="nav-link {{ request()->is('role') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Role</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/menu" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Menu</p>
        </a>
      </li>
      @endif
      
      <li class="nav-item">
        <a href="/masterdatasurat" class="nav-link {{ request()->is('masterdatasurat') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Master Data Surat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="approvallist" class="nav-link {{ request()->is('approvallist') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Approval List</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/approvallog" class="nav-link {{ request()->is('approvallog') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>Approval Log</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('/logout')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->