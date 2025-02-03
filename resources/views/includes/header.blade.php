<div class="header">
    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="Logo" style="max-height: 40px;
            width: 100%;
            aspect-ratio: 5;
            object-fit: cover;" />
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-small">
            <img src="{{ asset('assets/img/logo-small1.jpeg') }}" alt="Logo" />
        </a>
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
                    <a href="{{ route('notifications.clearAll') }}" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                        <li class="notification-message">
                            <a href="{{ route('candidates.index') }}" class="mark-notification-read" data-notification-id="{{ $notification->id }}">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">New Application</span>:
                                            {{ $notification->data['message'] }}
                                        </p>
                                        <p class="noti-time"><span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span></p>
                                    </div>
                                </div>
                            </a>
                         </li>
                        @empty
                        <li class="notification-message"><a href="#">No new notifications</a></li>
                        @endforelse
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
  <li>
            @impersonating($guard = null)
    <a href="{{ route('impersonate.leave') }}">Leave impersonation</a>
@endImpersonating
        </li>
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="{{ asset('assets/img/icons/header-icon-04.svg') }}" alt="" />
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" width="31"
                        alt="Soeng Souy" />
                    <div class="user-text">
                        <h6>{{ isset(auth()->user()->name) ? auth()->user()->name : '' }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="User Image"
                            class="avatar-img rounded-circle" />
                    </div>
                    <div class="user-text">
                        <h6>{{ isset(auth()->user()->name) ? auth()->user()->name : '' }}</h6>
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
<script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.mark-notification-read').on('click', function(e) {
        e.preventDefault();
        let notificationId = $(this).data('notification-id');
        let link = $(this).attr('href')

        $.ajax({
            url: `/notifications/${notificationId}/mark-as-read`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                 window.location.href = link; // or do nothing if no redirect
            },
               error: function(error) {
                   console.error("An error occurred:", error);
              }
        });
    });
})

</script>
