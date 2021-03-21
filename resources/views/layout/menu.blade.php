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