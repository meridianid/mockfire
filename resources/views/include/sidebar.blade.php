<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a><i class="fa fa-circle text-success"></i> <strong>{{ Auth::user()->role }}</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- <li class="active"><a href="home"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
        <li class="{{ Request::segment(1) === '' ? 'active' : null }}">
          <a href="{{ url('') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        @if(Auth::user()->role == 'Administrator')
          <li class="treeview {{ Request::segment(1) === 'admin' ? 'active' : null }}">
            <a href="#"><i class="fa fa-user-secret"></i> <span>Admin Menu</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::segment(2) === 'projects' ? 'active' : null }}">
                <a href="{{ url('admin/projects') }}"><i class="fa fa-book"></i> <span>Projects Control</span></a>
              </li>
              <li class="{{ Request::segment(2) === 'users' ? 'active' : null }}">
                <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span>Users Control</span></a>
              </li>
            </ul>
          </li>
        @endif

        <li class="{{ Request::segment(1) === 'project' ? 'active' : null }}">
          <a href="{{ url('project/'.Auth::user()->id.'') }}"><i class="fa fa-gears"></i> <span>Project</span></a>
        </li>

        <li class="{{ Request::segment(1) === 'help' ? 'active' : null }}">
          <a href="{{ url('help') }}"><i class="fa fa-graduation-cap"></i> <span>Help</span></a>
        </li>

        <li>
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out"></i><span>Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>