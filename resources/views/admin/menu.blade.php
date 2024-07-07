<h2>Menu</h2>
<div class="nav nav-pills flex-column admin-menu">
    <a id="nav-admin-users" class="nav-link {{ request()->routeIs(['admin.user.*', 'admin.adresse.*', 'admin.index']) ? 'active' : '' }}" href="{{ route('admin.user.index') }}">Utilisateurs</a>
    <a id="nav-admin-messages" class="nav-link {{ request()->routeIs('admin.message.*') ? 'active' : '' }}" href="{{ route('admin.message.index') }}">Messages</a>
    <a id="nav-admin-links" class="nav-link {{ request()->routeIs('admin.link.*') ? 'active' : '' }}" href="{{ route('admin.link.index') }}">Liens</a>
    <a id="nav-admin-activities" class="nav-link {{ request()->routeIs('admin.activity.*') ? 'active' : '' }}" href="{{ route('admin.activity.index') }}">Activités</a>
    <a id="nav-admin-partners" class="nav-link {{ request()->routeIs('admin.partner.*') ? 'active' : '' }}" href="{{ route('admin.partner.index') }}">Partenaires</a>
</div>
