<header class="header-area">
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <a class="nav-brand" href="index.html"><img src="{{ asset('assets/showcase/img/core-img/ExC-logo.png') }}" alt=""></a>
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <div class="classy-menu">
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <div class="classynav">
                        <ul id="nav">
                            <li class="@if (isset($home)) current-item @endif"><a href="{{ route('home.index') }}">Accueil</a></li>
                            <li class="@if (isset($services)) current-item @endif"><a href="{{ route('services.index') }}">Nos services</a></li>
                            <li><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="#">- Blog</a></li>
                                    <li><a href="#">- Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="@if (isset($faq)) current-item @endif"><a href="{{ route('faq.index') }}">FAQ</a></li>
                            <li class="@if (isset($aboutUs)) current-item @endif"><a href="{{ route('about_us.index') }}">A propos</a></li>
                            <li class="@if (isset($contactUs)) current-item @endif"><a href="{{ route('contact_us.index') }}">Contact</a></li>
                        </ul>
                        <div class="login-register-btn mx-3">
                            <span><a href="{{ route('login') }}">Se connecter</a> / <a href="{{ route('register') }}">S'inscrire</a></span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>