<h2>Menu</h2>
<ul class="nav nav-tabs nav-stacked admin-menu">
	<li id="nav-admin-users"><a href="{{ URL::route('admin.user.index') }}">Utilisateurs</a></li>
	<li id="nav-admin-messages"><a href="{{ URL::route('admin.message.index') }}">Messages</a></li>
	<li id="nav-admin-links"><a href="{{ URL::route('admin.link.index') }}">Liens</a></li>
	<li id="nav-admin-activities"><a href="{{ URL::route('admin.activity.index') }}">Activités</a></li>
	<li id="nav-admin-partners"><a href="{{ URL::route('admin.partner.index') }}">Partenaires</a></li>
</ul>