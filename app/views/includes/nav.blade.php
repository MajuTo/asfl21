<!-- NAVIGATION -->
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">ASFL21</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="menu">

      <ul class="nav navbar-nav navbar-right text-center">
        <li id="nav-accueil">
        	<a href="{{ URL::route('home') }}"><i class="fa fa-home"></i><br>Accueil</a>
        </li>
        <li id="nav-metier">
        	<a href="{{ URL::route('notremetier') }}"><i class="fa fa-camera"></i><br>Notre métier</a>
        </li>
        <li id="nav-trouver">
        	<a href="{{ URL::route('noustrouver') }}"><i class="fa fa-camera"></i><br>Nous trouver</a>
        </li>
        <li id="nav-contact">
        	<a href="{{ URL::route('contact') }}"><i class="fa fa-envelope"></i><br>Contact</a>
        </li>
        <li id="nav-liens">
            <a href="{{ URL::route('contact') }}"><i class="fa fa-external-link-square"></i><br>Liens Utiles</a>
        </li>
        <li id="nav-calendrier">
            <a href="{{ URL::route('contact') }}"><i class="fa fa-calendar"></i><br>Calendrier</a>
        </li>

        <li class="dropdown" id="nav-membre">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
        		<i class="fa fa-user"></i><br>Membres<span class="caret"></span>
        	</a>
        	@if (Auth::guest())
        		<ul class="dropdown-menu dropdown-menu-left" role="menu">
        			<li id="nav-login"><a href="{{ URL::route('login') }}">Login</a></li>
        		</ul>
        	@else 
        		<ul class="dropdown-menu dropdown-menu-left" role="menu">
        			<li id="nav-profil"><a href="{{ URL::route('user.edit', Auth::user()->id) }}">Mon Profil</a></li>
        			<li id="nav-info"><a href="{{ URL::route('message.index') }}">Message</a></li>
        			@if(!Auth::guest() and Auth::user()->group->id == 2)
        				<li id="nav-admin"><a href="{{ URL::route('admin.index') }}">Admin</a></li>
        			@endif
        			<li id="nav-logout"><a href="{{ URL::route('logout') }}">Logout</a></li>
        		</ul>
        	@endif
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<!-- END NAVIGATION -->

