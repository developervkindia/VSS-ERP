<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="Logo" style="max-height: 40px;
            width: 100%;
            aspect-ratio: 5;
            object-fit: cover;" />
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('assets/img/logo-small1.jpeg') }}" alt="Logo"  />
        </a>
        {{-- <div class="text-primary h1"  style="margin:-9%"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100%" height="inherit" /></div> --}}
        {{-- <a href="index.html" class="logo"><h1 style="
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            font-weight: bold;
            color: #007BFF; /* Primary blue */
            text-shadow: 1px 7px 5px rgba(7, 0, 259, 0.4);
            /* letter-spacing: 2px; */
            display: inline-block;
            /* padding: 0.5rem 1rem; */
            /* border: 2px solid #007BFF; */
            border-radius: 10px;
            /* background: linear-gradient(90deg, #0056b3, #007BFF); */
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.4);">
            VSS-ERP
        </h1></a>
        <a href="index.html" class="logo logo-small">
            <h1 style="
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            font-weight: bold;
            color: #007BFF; /* Primary blue */
            text-shadow: 1px 7px 5px rgba(7, 0, 259, 0.4);
            /* letter-spacing: 2px; */
            display: inline-block;
            /* padding: 0.5rem 1rem; */
            /* border: 2px solid #007BFF; */
            border-radius: 10px;
            /* background: linear-gradient(90deg, #0056b3, #007BFF); */
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.4);">
            V
        </h1>
        </a> --}}
    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here" />
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown language-drop me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/img/icons/header-icon-01.svg') }}" alt="" />
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
                <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
            </div>
        </li>

        <li class="nav-item dropdown noti-dropdown me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/img/icons/header-icon-05.svg') }}" alt="" />
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg" />
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg" />
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg" />
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-13.jpg') }}" />
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>

        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="{{ asset('assets/img/icons/header-icon-04.svg') }}" alt="" />
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" width="31" alt="Soeng Souy" />
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle" />
                    </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="inbox.html">Inbox</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>

                </form>
            </div>
        </li>
    </ul>
</div>
