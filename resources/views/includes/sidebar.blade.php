<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>

                 <li class="submenu">
                    <a href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboards</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('dashboard.admin') }}">Admin Dashboard</a></li>
                        <li><a href="{{ route('dashboard.hr') }}">HR Dashboard</a></li>
                         <li><a href="{{ route('dashboard.manager') }}">Manager Dashboard</a></li>
                        <li><a href="{{ route('dashboard.employee') }}">Employee Dashboard</a></li>
                    </ul>
                </li>


                <li class="menu-title">
                    <span>Organization</span>
                </li>

                <li class="{{ Request::segment(1) == 'departments' ? 'active' : '' }}">
                    <a href="{{ route('departments.index') }}"><i class="fas fa-sitemap"></i> <span>Departments</span></a>
                </li>
                <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Employees</span></a>
                </li>
                 <li class="menu-title">
                    <span>Projects & Tasks</span>
                </li>
                <li class="{{ Request::segment(1) == 'projects' ? 'active' : '' }}">
                    <a href="{{ route('projects.index') }}"><i class="fas fa-project-diagram"></i> <span>Projects</span></a>
                </li>
                <li class="{{ Request::segment(1) == 'tasks' ? 'active' : '' }}">
                    <a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> <span>Tasks</span></a>
                </li>

                 <li class="menu-title">
                    <span>HR Management</span>
                </li>

                <li class="{{ Request::segment(1) == 'performance_evaluations' ? 'active' : '' }}">
                    <a href="{{ route('performance_evaluations.index') }}"><i class="fas fa-clipboard-check"></i> <span>Performance Evaluations</span></a>
                </li>
                <li class="{{ Request::segment(1) == 'leave_requests' ? 'active' : '' }}">
                    <a href="{{ route('leave_requests.index') }}"><i class="fas fa-calendar-alt"></i> <span>Leave Requests</span></a>
                </li>
                 <li class="menu-title">
                    <span>Payroll</span>
                 </li>
                <li class="{{ Request::segment(1) == 'payroll_details' ? 'active' : '' }}">
                    <a href="{{ route('payroll_details.index') }}"><i class="fas fa-money-bill-wave"></i> <span>Payroll Details</span></a>
                </li>
                <li class="menu-title">
                    <span>User Management</span>
                </li>
                <li class="{{ Request::segment(1) == 'roles' ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}"><i class="fas fa-user-tag"></i> <span>Roles</span></a>
                </li>
                <li class="{{ Request::segment(1) == 'permissions' ? 'active' : '' }}">
                    <a href="{{ route('permissions.index') }}"><i class="fas fa-user-shield"></i> <span>Permissions</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
