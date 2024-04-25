<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userManagement" aria-expanded="false" aria-controls="userManagement">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    User Management
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="userManagement">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('users.index') }}">All Users</a>
        <a class="nav-link" href="{{ route('users.create') }}">Add New User</a>
    </nav>
</div>

<a class="nav-link" href="{{ route('blogs.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
    Blogs
</a>
<div class="sb-sidenav-menu-heading">System Settings</div>

<a class="nav-link" href="{{ route('settings.update_settings') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
    General Settings
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#languages" aria-expanded="false" aria-controls="languages">
    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
    Languages
    <div class="sb-sidenav-collapse-arrow"><i class="ti-angle-down"></i></div>
</a>
<div class="collapse" id="languages">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('languages.index') }}">All Language</a>
        <a class="nav-link" href="{{ route('languages.create') }}">Add New</a>
    </nav>
</div>

<a class="nav-link" href="#">
    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
    Email Template
</a>

<a class="nav-link" href="{{ route('database_backups.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-hdd"></i></div>
    Database Backup
</a>
