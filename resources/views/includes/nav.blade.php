@php
    $route = Route::currentRouteName() ?? '';
    $isActive = fn (bool $cond) => $cond ? 'active' : '';
@endphp
<nav class="navbar navbar-expand-lg mb-3" id="main-nav">
    <div class="container-fluid px-0">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('/assets/img/logo.png') }}" alt="logo" class="logo">
            <span class="navbar-brand text-center">Association des Sages Femmes Libérales <br> de Côte d'Or</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Afficher le menu">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item" id="nav-accueil">
                    <a class="nav-link {{ $isActive($route === 'home') }}" href="{{ route('home') }}"><i class="fa fa-home"></i><br>Accueil</a>
                </li>
                <li class="nav-item" id="nav-metier">
                    <a class="nav-link {{ $isActive($route === 'notremetier') }}" href="{{ route('notremetier') }}"><i class="fa fa-user-md"></i><br>Notre Métier</a>
                </li>
                <li class="nav-item" id="nav-trouver">
                    <a class="nav-link {{ $isActive(in_array($route, ['noustrouver', 'user.show'])) }}" href="{{ route('noustrouver') }}"><i class="fa fa-map-marker"></i><br>Nous Trouver</a>
                </li>
                <li class="nav-item" id="nav-liens">
                    <a class="nav-link {{ $isActive($route === 'link') }}" href="{{ route('link') }}"><i class="fa fa-external-link-square"></i><br>Liens Utiles</a>
                </li>
                <li class="nav-item" id="nav-calendrier">
                    <a class="nav-link {{ $isActive(Str::contains($route, 'calendrier')) }}" href="{{ route('calendrier.index') }}"><i class="fa fa-calendar"></i><br>Calendrier</a>
                </li>
                <li class="nav-item" id="nav-contact">
                    <a class="nav-link {{ $isActive($route === 'contact.index') }}" href="{{ route('contact.index') }}"><i class="fa fa-envelope"></i><br>Contact</a>
                </li>
                @guest
                    <li class="nav-item" id="nav-login">
                        <a class="nav-link {{ $isActive($route === 'login') }}" href="{{ route('login') }}"><i class="fa fa-users"></i><br>Espace pro</a>
                    </li>
                @else
                    <li class="nav-item dropdown" id="nav-membre">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                           class="nav-link dropdown-toggle {{ $isActive(Str::contains($route, ['admin', 'message', 'user.edit', 'adresse'])) }}">
                            <i class="fa fa-users"></i><br>Espace pro
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item {{ $isActive($route === 'message.index') }}" href="{{ route('message.index') }}">Message</a></li>
                            <li><a class="dropdown-item {{ $isActive($route === 'user.edit') }}" href="{{ route('user.edit', auth()->user()) }}">Mon Profil</a></li>
                            @if(in_array(auth()->user()->group_id, [2, 3]))
                                <li><a class="dropdown-item {{ $isActive(Str::startsWith($route, 'admin.')) }}" href="{{ route('admin.user.index') }}">Admin</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
