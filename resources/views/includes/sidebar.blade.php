<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.html">Admin Dashboard</a></li>
                        <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                        <li><a href="student-dashboard.html">Student Dashboard</a></li>
                    </ul>
                </li> --}}
                <li class="{{ Request::Segment(1) == 'projects' ? 'active' : '' }}">
                    <a href="{{ route('projects.index') }}"><i class="fas fa-braille"></i> <span>Projects</span></a>
                </li>
                <li class="{{ Request::Segment(1) == 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
