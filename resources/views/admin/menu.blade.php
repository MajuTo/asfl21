<h2>Menu</h2>
<ul class="nav nav-tabs nav-stacked admin-menu">
	<li id="nav-admin-users" class="{{ Str::contains(Route::currentRouteName(), 'admin.user') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">Utilisateurs</a></li>
	<li id="nav-admin-messages" class="{{ Str::contains(Route::currentRouteName(), 'admin.message') ? 'active' : '' }}"><a href="{{ route('admin.message.index') }}">Messages</a></li>
	<li id="nav-admin-links" class="{{ Str::contains(Route::currentRouteName(), 'admin.link') ? 'active' : '' }}"><a href="{{ route('admin.link.index') }}">Liens</a></li>
	<li id="nav-admin-activities" class="{{ Str::contains(Route::currentRouteName(), 'admin.activity') ? 'active' : '' }}"><a href="{{ route('admin.activity.index') }}">Activités</a></li>
	<li id="nav-admin-partners" class="{{ Str::contains(Route::currentRouteName(), 'admin.partner') ? 'active' : '' }}"><a href="{{ route('admin.partner.index') }}">Partenaires</a></li>
</ul>
