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
          <a><i class="fa fa-circle text-success"></i> <strong>{{ Auth::user()->level }}</strong></a>
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

        <li class="{{ Request::segment(1) === 'project' ? 'active' : null }}">
          <a href="{{ url('project/'.Auth::user()->id.'') }}"><i class="fa fa-gears"></i> <span>Project</span></a>
        </li>

        <li class="{{ Request::segment(1) === 'callour' ? 'active' : null }}">
          <a href="{{ url('callour') }}"><i class="fa fa-comments-o"></i> <span>Help</span></a>
        </li>

        <li class="{{ Request::segment(1) === 'tos' ? 'active' : null }}">
          <a href="{{ url('tos') }}"><i class="fa fa-info-circle"></i> <span>Term of Service</span></a>
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