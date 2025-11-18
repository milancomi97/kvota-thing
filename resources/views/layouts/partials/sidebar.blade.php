<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">CodeGalerija</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
            </div>
        </div>

        <nav class="mt-2">
            @if(auth()->user()->role_id == 1)

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link {{ request()->is('events*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Događaji</p>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Korisnici</p>
                        </a>
                    </li>
                @endif


                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a href="{{ route('moderator.dashboard') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Moji dogadjaji</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a href="{{ route('analytics.dashboard') }}"
                           class="nav-link {{ request()->is('analytics*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Google Analytics</p>
                        </a>
                    </li>
                @endif

            </ul>

        </nav>
    </div>
</aside>
