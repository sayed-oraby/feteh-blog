<li class="nav-item dropdown">
    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ti-bell"></i>
        @if ($unreadNotificationsCount > 0)
            <span class="badge badge-danger notification-status"> </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications pb-0">
        <div class="dropdown-header notifications">
            <strong>Notifications</strong>
            <span class="badge badge-pill badge-warning" id="unreadNotificationsCount">{{ $unreadNotificationsCount }}</span>
        </div>
        <div class="dropdown-divider"></div>

        <div class="notification scrollbar max-h-200" id="notification-div">
            @foreach ($notifications as $notification)
                <a href="{{ route('notifications.show', $notification->id) }}" class="dropdown-item @if($notification->unread()) unread @endif">
                    <span>{{ $notification->data['title'] }}</span>
                    <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
                    <p class="pl-1 pr-1">{{ $notification->data['body'] }}</p>
                </a>
                <div class="dropdown-divider m-0" style="border-top: 2px solid white !important"></div>
            @endforeach
        </div>

        <div class="dropdown-divider mb-0"></div>
        <div class="text-center mb-0">
            <a href="{{ route('notifications.index') }}" class="dropdown-item mb-0">All Notifications</a>
        </div>
    </div>
</li>
