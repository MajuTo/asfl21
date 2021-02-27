<nav class="navbar navbar-expand-md navbar-light bg-light pb-1">
{{--    <a class="navbar-brand" href="#">Navbar</a>--}}
    <a href="{{ route('home') }}">
        {{ Html::image(asset('img/logo.png'), 'logo', ['class' => 'logo']) }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <span class="navbar-brand text-center text-reset">Association des Sages Femmes Libérales <br>  de Côte d'Or</span>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item px-2" id="nav-accueil">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i><br>Accueil</a>
            </li>
            <li class="nav-item px-2" id="nav-metier">
                <a class="nav-link" href="{{ route('notremetier') }}"><i class="fas fa-user-md"></i><br>Notre Métier</a>
            </li>
            <li class="nav-item px-2" id="nav-trouver">
                <a class="nav-link" href="{{ route('noustrouver') }}"><i class="fas fa-map-marker"></i><br>Nous Trouver</a>
            </li>
            <li class="nav-item px-2" id="nav-liens">
                <a class="nav-link" href="{{ route('link') }}"><i class="fas fa-external-link-square-alt"></i><br>Liens Utiles</a>
            </li>
            <li class="nav-item px-2" id="nav-calendrier">
                <a class="nav-link" href="{{ route('calendrier.index') }}"><i class="fas fa-calendar"></i><br>Calendrier</a>
            </li>
            <li class="nav-item px-2" id="nav-contact">
                <a class="nav-link" href="{{ route('contact.index') }}"><i class="fas fa-envelope"></i><br>Contact</a>
            </li>
            @if (auth()->guest())
                <li class="nav-item px-2" id="nav-login">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-users"></i><br>Espace pro</a>
                </li>
            @else
                <li class="nav-item px-2 dropdown" id="nav-membre">
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

