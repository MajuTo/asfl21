<!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">ASFL21 - a super cool design agency...</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="{{ URL::route('home') }}"><i class="fa fa-home"></i><br>Accueil</a>
						</li>
						<li>
							<a href="{{ URL::route('notremetier') }}"><i class="fa fa-camera"></i><br>Notre métier</a>
						</li>
						<li>
							<a href="{{ URL::route('noustrouver') }}"><i class="fa fa-camera"></i><br>Nous trouver</a>
						</li>
						<li>
							<a href="{{ URL::route('membres') }}"><i class="fa fa-user"></i><br>Membres</a>
						</li>
						<li>
							<a href="{{ URL::route('contact') }}"><i class="fa fa-envelope"></i><br>Contact</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
								<i class="fa fa-cog"></i><br>Admin<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-left" role="menu">
								<li class="active"><a href="{{ URL::route('admin.index') }}">Admin</a></li>
								<li><a href="{{ URL::route('logout') }}">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>