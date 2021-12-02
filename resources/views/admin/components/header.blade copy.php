<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Vous avez {{ newMessages() }} @if (newMessages() <= 1) nouveau message @else nouveaux messages @endif ">
                        <i class="align-middle" data-feather="message-circle"></i>
                        <span class="indicator">{{ newMessages() }}</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                    @php
                        $fiveRecentMessages = fiveRecentMessages();
                        $takeLastFiveMessages = sizeof($fiveRecentMessages);
                    @endphp
                    @if (!empty($fiveRecentMessages) && $takeLastFiveMessages > 0)
                        <div class="dropdown-menu-header">
                            <div class="position-relative">
                                {{ $takeLastFiveMessages }} @if ($takeLastFiveMessages <= 1)
                                    dernier nouveau message
                                @else
                                    derniers nouveaux messages
                                @endif
                            </div>
                        </div>
                        <div class="list-group">
                            @foreach ($fiveRecentMessages as $contact)
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/admin/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Ashley Briggs">
                                        </div>
                                        <div class="col-10 ps-2">
                                            @if ($contact->social_reason != null)
                                                <div class="text-dark">{{ $contact->social_reason }}</div>
                                            @else
                                                <div class="text-dark">{{ $contact->first_name }} {{ $contact->last_name }}</div>
                                            @endif
                                            <div class="text-muted small mt-1">{{ $contact->message }}</div>
                                            <div class="text-muted small mt-1">15m ago</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="{{ route('new_message.index') }}" class="text-muted text-decoration-none">Afficher tous les messages</a>
                        </div>
                    @else
                        <div class="dropdown-menu-header">
                            <div class="position-relative">
                                Aucun nouveau message
                            </div>
                        </div>
                    @endif
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell-off"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        4 New Notifications
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Update completed</div>
                                    <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                    <div class="text-muted small mt-1">2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-warning" data-feather="bell"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Lorem ipsum</div>
                                    <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                                    <div class="text-muted small mt-1">6h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-primary" data-feather="home"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Login from 192.186.1.1</div>
                                    <div class="text-muted small mt-1">8h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-success" data-feather="user-plus"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">New connection</div>
                                    <div class="text-muted small mt-1">Anna accepted your request.</div>
                                    <div class="text-muted small mt-1">12h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/admin/img/flags/us.png') }}" alt="English" />
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/admin/img/flags/us.png') }}" alt="English" width="20" class="align-middle me-1" />
                        <span class="align-middle">English</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/admin/img/flags/es.png') }}" alt="Spanish" width="20" class="align-middle me-1" />
                        <span class="align-middle">Spanish</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/admin/img/flags/de.png') }}" alt="German" width="20" class="align-middle me-1" />
                        <span class="align-middle">German</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/admin/img/flags/nl.png') }}" alt="Dutch" width="20" class="align-middle me-1" />
                        <span class="align-middle">Dutch</span>
                    </a>
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
