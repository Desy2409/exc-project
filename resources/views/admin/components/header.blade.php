<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    {{-- <form class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
            <button class="btn" type="button">
                <i class="align-middle" data-feather="search"></i>
            </button>
        </div>
    </form> --}}

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <contact-notification v-bind:contacts='contacts'></contact-notification>
            {{-- <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Vous @if (Auth::user()->unreadNotifications()->count() == 0) n'avez aucune notification @elseif(Auth::user()->unreadNotifications()->count()==1) avez une nouvelle notification @else {{ Auth::user()->unreadNotifications()->count() }} nouvelles notifications @endif ">
                        @if (Auth::user()->unreadNotifications()->count())
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator">{{ Auth::user()->unreadNotifications()->count() }}</span>
                        @else
                            <i class="align-middle" data-feather="bell-off"></i>
                            <span class="indicator">{{ Auth::user()->unreadNotifications()->count() }}</span>
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                    @if (Auth::user()->unreadNotifications()->count())
                        <div class="dropdown-menu-header">
                            @if (Auth::user()->unreadNotifications()->count() >= 5)
                                5 dernières notifications
                            @else
                                @if (Auth::user()->unreadNotifications()->count() == 1)
                                    Dernière notification
                                @else
                                    {{ Auth::user()->unreadNotifications()->count() }} dernières notifications
                                @endif
                            @endif
                        </div>
                        <div class="list-group">
                            @foreach (Auth::user()->unreadNotifications as $notification)
                                @if ($notification->type == 'App\Notifications\NewContactMessageNotification')
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="align-middle me-2 far fa-fw fa-envelope" style="color: green; font-size: 16px !important;"></i>
                                            </div>
                                            <div class="col-10">
                                                @if ($notification->data['contact']['person_type'] == 'Personne physique')
                                                    <div class="text-dark">{{ $notification->data['contact']['first_name'] }} {{ $notification->data['contact']['last_name'] }}</div>
                                                @endif
                                                @if ($notification->data['contact']['person_type'] == 'Entreprise')
                                                    <div class="text-dark">{{ $notification->data['contact']['social_reason'] }}</div>
                                                @endif


                                                <div class="text-secondary">{{ $notification->data['contact']['object'] }}</div>
                                                <div class="text-muted small mt-1">{{ $notification->data['contact']['message'] }}</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Afficher toutes les notifications</a>
                        </div>
                    @else
                        <div class="dropdown-menu-header">
                            <div class="position-relative">
                                Vous n'avez aucune notification
                            </div>
                        </div>
                    @endif
                </div>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/admin/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded-circle me-1" alt="{{ Auth::user()->name }}" />
                    <span class="text-dark">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Se déconnecter
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
