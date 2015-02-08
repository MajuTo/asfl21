<!-- NAVIGATION -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">ASFL21</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        
        <li>
        	<a href="{{ URL::route('home') }}" class="onHoverBorderTop"><i class="fa fa-home"></i><br>Accueil</a>
        </li>
        <li>
        	<a href="{{ URL::route('notremetier') }}"><i class="fa fa-camera"></i><br>Notre métier</a>
        </li>
        <li>
        	<a href="{{ URL::route('noustrouver') }}"><i class="fa fa-camera"></i><br>Nous trouver</a>
        </li>
        <li>
        	<a href="{{ URL::route('contact') }}"><i class="fa fa-envelope"></i><br>Contact</a>
        </li>

        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
        		<i class="fa fa-user"></i><br>Membres<span class="caret"></span>
        	</a>
        	@if (Auth::guest())
        		<ul class="dropdown-menu dropdown-menu-left" role="menu">
        			<li><a href="{{ URL::route('login') }}">Login</a></li>
        		</ul>
        	@else 
        		<ul class="dropdown-menu dropdown-menu-left" role="menu">
        			<li><a href="{{ URL::route('user.edit', Auth::user()->id) }}">Mon Profil</a></li>
        			<li><a href="{{ URL::route('member.index') }}">Tableau de Bord</a></li>
        			@if(!Auth::guest() and Auth::user()->group->id == 2)
        				<li><a href="{{ URL::route('admin.index') }}">Admin</a></li>
        			@endif
        			<li><a href="{{ URL::route('logout') }}">Logout</a></li>
        		</ul>
        	@endif
        </li>

        @if(!Auth::guest() and Auth::user()->group->id == 2)
        	<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
        			<i class="fa fa-cog"></i><br>Admin<span class="caret"></span>
        		</a>
        		<ul class="dropdown-menu dropdown-menu-left" role="menu">
        			<li><a href="{{ URL::route('admin.index') }}">Admin</a></li>
        			<li><a href="{{ URL::route('logout') }}">Logout</a></li>
        		</ul>
        	</li>
        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- END NAVIGATION -->