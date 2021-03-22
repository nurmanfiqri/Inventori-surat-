<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        @php
         $currentUrl = explode('/', Route::getCurrentRoute()->uri());
         $countEndPoint = count($currentUrl);
        ($countEndPoint == 2) ? $currentUrl = isset($currentUrl) ? $currentUrl[0].'/'.$currentUrl[1] : '' : $currentUrl = isset($currentUrl) ? '/'.$currentUrl[0] : ''; 
        // dd($currentUrl);
        @endphp
        @if(isset($menuList))
        @foreach ($menuList as $key => $r)
          @if($r->parent == 0 && $r->link == '#')
          <li class="nav-item has-treeview" id="collapse-{{$key}}">
            <a href="#" class="nav-link">
              <ion-icon class="nav-icon" name="{{$r->icon}}"></ion-icon>
              <p>
                {{$r->title}}
                <i class="right fas fa-angle-right"></i>
              </p>
      <li class="nav-item">
        <a href="{{ url ('/dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="apps-outline"></ion-icon>
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          <p>Dashboard</p>
        </a>
      </li>
  
      {{-- <li class="nav-item">
        <a href="{{url ('/user')}}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="people-outline"></ion-icon>
          <p>User</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('/role')}}" class="nav-link {{ request()->is('role') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="key-outline"></ion-icon>
          <p>Role</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a href="{{url ('/menu')}}" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">
          <ion-icon class="nav-icon" name="menu-outline"></ion-icon>
          <p>Menu</p>
        </a>
      </li> --}}
     
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
      {{-- </li>
        <a href="{{url ('/logout')}}" class="nav-link">
          <ion-icon class="nav-icon" name="log-out-outline"></ion-icon>
          <p>Logout</p>
        </a>
      </li> --}}

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

            @if($r->sub_menu2)
            <ul class="nav nav-treeview">
              @foreach ($r->sub_menu2 as $s)
              <li class="nav-item ">
                <a href="{{url($s->link)}}"
                  class="nav-link {{$currentUrl == $s->link ? 'active' : ''}} ml-4">
                  <ion-icon name="{{$s->icon}}"></ion-icon>
                  <p>{{$s->title}}</p>
                </a>
              </li>
              @if($currentUrl == $s->link)
              <script>
                $('#collapse-{{$key}}').addClass('menu-open');
              </script>
              @endif
              @endforeach
            </ul>
            @endif

          </li>
          @else
          <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link">
              <ion-icon class="nav-icon" name="analytics-outline"></ion-icon>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif
          @endforeach
        @endif
    </ul>
  </nav>

  <!-- /.sidebar-menu -->