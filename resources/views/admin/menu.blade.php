@php($route = Route::currentRouteName() ?? '')
<h2>Menu</h2>
<nav class="nav flex-column admin-menu">
	<a id="nav-admin-users" class="nav-link {{ Str::contains($route, 'admin.user') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">Utilisateurs</a>
	<a id="nav-admin-messages" class="nav-link {{ Str::contains($route, 'admin.message') ? 'active' : '' }}" href="{{ route('admin.message.index') }}">Messages</a>
	<a id="nav-admin-links" class="nav-link {{ Str::contains($route, 'admin.link') ? 'active' : '' }}" href="{{ route('admin.link.index') }}">Liens</a>
	<a id="nav-admin-activities" class="nav-link {{ Str::contains($route, 'admin.activity') ? 'active' : '' }}" href="{{ route('admin.activity.index') }}">Activités</a>
	<a id="nav-admin-partners" class="nav-link {{ Str::contains($route, 'admin.partner') ? 'active' : '' }}" href="{{ route('admin.partner.index') }}">Partenaires</a>
</nav>
