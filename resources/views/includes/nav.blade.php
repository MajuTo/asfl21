<nav class="navbar navbar-default text-center" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
        <i class="fa fa-bars"></i>
      </button>
    </div>
      <a href="{{ route('home') }}">
          {{ Html::image(asset('/assets/img/logo.png'), 'logo', ['class' => 'logo']) }}
      </a>
      <span class="navbar-brand text-center">Association des Sages Femmes Libérales <br>  de Côte d'Or</span>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="menu">
      <ul class="nav navbar-nav navbar-right ">
        <li id="nav-accueil" class="{{ (Route::currentRouteName() === 'home') ? 'active' : '' }}">
        	<a href="{{ route('home') }}"><i class="fa fa-home"></i><br>Accueil</a>
        </li>
        <li id="nav-metier" class="{{ (Route::currentRouteName() === 'notremetier') ? 'active' : '' }}">
        	<a href="{{ route('notremetier') }}"><i class="fa fa-user-md"></i><br>Notre Métier</a>
        </li>
        <li id="nav-trouver" class="{{ (Route::currentRouteName() === 'noustrouver') || (Route::currentRouteName() === 'user.show') ? 'active' : '' }}">
        	<a href="{{ route('noustrouver') }}"><i class="fa fa-map-marker"></i><br>Nous Trouver</a>
        </li>
        <li id="nav-liens" class="{{ (Route::currentRouteName() === 'link') ? 'active' : '' }}">
            <a href="{{ route('link') }}"><i class="fa fa-external-link-square"></i><br>Liens Utiles</a>
        </li>
        <li id="nav-calendrier" class="{{ Str::contains(Route::currentRouteName(), 'calendrier') ? 'active' : '' }}">
            <a href="{{ route('calendrier.index') }}"><i class="fa fa-calendar"></i><br>Calendrier</a>
        </li>
        <li id="nav-contact" class="{{ (Route::currentRouteName() === 'contact.index') ? 'active' : '' }}">
        	<a href="{{ route('contact.index') }}"><i class="fa fa-envelope"></i><br>Contact</a>
        </li>
        @if (auth()->guest())
            <li id="nav-login" class="{{ (Route::currentRouteName() === 'login') ? 'active' : '' }}">
                <a href="{{ route('login') }}"><i class="fa fa-users"></i><br>Espace pro</a>
            </li>
        @else
            <li
                class="dropdown {{
                    Str::contains(Route::currentRouteName(), 'admin')
                     || Str::contains(Route::currentRouteName(), 'message')
                     || Str::contains(Route::currentRouteName(), 'user.edit')
                     || Str::contains(Route::currentRouteName(), 'adresse')
                     ? 'active' : '' }}"
                id="nav-membre"
            >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                    <i class="fa fa-users"></i><br>Espace pro<span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                    <li id="nav-info" class="{{ (Route::currentRouteName() === 'message.index') ? 'active' : '' }}"><a href="{{ route('message.index') }}">Message</a></li>
                    <li id="nav-profil" class="{{ (Route::currentRouteName() === 'user.edit') ? 'active' : '' }}"><a href="{{ route('user.edit', auth()->user()->id) }}">Mon Profil</a></li>
                    @if(!auth()->guest() and auth()->user()->group->id == 2 or auth()->user()->group->id == 3)
                        <li id="nav-admin" class="{{ (Route::currentRouteName() === 'admin.user.index') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">Admin</a></li>
                    @endif
                    <li id="nav-logout" class="{{ (Route::currentRouteName() === 'logout') ? 'active' : '' }}"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Déconnexion</a></li>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<!-- END NAVIGATION -->

