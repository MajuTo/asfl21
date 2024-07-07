<nav class="navbar navbar-expand-lg navbar-light bg-light pb-1 container">
{{--    <a class="navbar-brand" href="#">Navbar</a>--}}
    <a class="navbar-brand h-100" href="{{ route('home') }}">
{{--        {{ html()->img(asset('img/logo.png'), 'logo')->class('logo') }}--}}
        <span class="navbar-brand text-center text-muted align-middle">Association des Sages Femmes Libérales <br>  de Côte d'Or</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-center">
            <li id="nav-accueil" class="nav-item px-2 {{ (request()->routeIs('home')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i><br>Accueil</a>
            </li>
            <li id="nav-metier" class="nav-item px-2 {{ (request()->routeIs('notremetier')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('notremetier') }}"><i class="fas fa-user-md"></i><br>Notre Métier</a>
            </li>
            <li id="nav-trouver" class="nav-item px-2 {{ (request()->routeIs('noustrouver')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('noustrouver') }}"><i class="fas fa-map-marker-alt"></i><br>Nous Trouver</a>
            </li>
            <li id="nav-liens" class="nav-item px-2 {{ (request()->routeIs('link')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('link') }}"><i class="fas fa-external-link-square-alt"></i><br>Liens Utiles</a>
            </li>
            <li id="nav-calendrier" class="nav-item px-2 {{ (request()->routeIs('calendrier.index')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('calendrier.index') }}"><i class="fas fa-calendar-alt"></i><br>Calendrier</a>
            </li>
            <li id="nav-contact" class="nav-item px-2 {{ (request()->routeIs('contact.*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}"><i class="fas fa-envelope"></i><br>Contact</a>
            </li>
            @if (auth()->guest())
                <li id="nav-login" class="nav-item px-2 {{ (request()->routeIs('login')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-users"></i><br>Espace pro</a>
                </li>
            @else
                <li class="nav-item px-2 dropdown {{ request()->routeIs(['admin.*', 'message.index', 'user.edit', 'adresse.*']) ? 'active' : '' }}" id="nav-membre">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                        <i class="fas fa-users"></i><br>Espace pro<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a id="nav-info" class="dropdown-item" href="{{ route('message.index') }}">Message</a>
                        <a id="nav-profil" class="dropdown-item" href="{{ route('user.edit', auth()->user()->id) }}">Mon Profil</a>
                        @if(!auth()->guest() and auth()->user()->group->id == 2 or auth()->user()->group->id == 3)
                            <a id="nav-admin" class="dropdown-item" href="{{ route('admin.index') }}">Admin</a>
                        @endif
                        <a id="nav-logout" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Déconnexion</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
<!-- END NAVIGATION -->

