<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Employee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->is_admin)
            <li><a href="{{ route('employee.create') }}"><i class="fa fa-circle-o"></i> Create Employee</a></li>
            @endif
            <li><a href="{{ route('profile') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Attendance</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>