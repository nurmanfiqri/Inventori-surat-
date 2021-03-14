<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url ('/dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="apps-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Dashboard</p>
        </a>
      </li>
      @if (auth()->user()->level=="admin")
      <li class="nav-item">
        <a href="{{url ('/user')}}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="people-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>User</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('/role')}}" class="nav-link {{ request()->is('role') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="key-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Role</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('/menu')}}" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="menu-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Menu</p>
        </a>
      </li>
     
      @endif
      
      <li class="nav-item">
        <a href="{{url ('master/surat')}}" class="nav-link {{ request()->is('master/surat') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="analytics-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Master Data Surat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('approval/approval_list')}}" class="nav-link {{ request()->is('approvallist') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="checkmark-done-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Approval List</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('approval/approval_log')}}" class="nav-link {{ request()->is('approval_log') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="document-attach-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Approval Log</p>
        </a>
      </li>

      <!--- Setting Approval --->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <ion-icon class="nav-icon" name="construct-outline"></ion-icon>
          <p>
            Setting
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item ml-4">
            <a href="{{url('setting/workflow')}}" class="nav-link {{ request()->is('approval') ? 'active' : '' }}">
              <ion-icon name="checkmark-outline"></ion-icon>
              <p>Setting Approval</p>
            </a>
          </li>
          <li class="nav-item ml-4">
            <a href="{{url('setting/unit_kerja')}}" class="nav-link {{ request()->is('unit_kerja') ? 'active' : '' }}">
              <ion-icon name="checkmark-outline"></ion-icon>
              <p>Unit Kerja</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->